<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::latest('activity_date')
            ->latest()
            ->paginate(10);

        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        return view('admin.activities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules());

        $slug = $this->uniqueSlug($validated['title']);

        $thumbnail = $request->hasFile('thumbnail')
            ? $request->file('thumbnail')->store('activities', 'public')
            : null;

        $isFeatured = $request->boolean('is_featured');

        $activity = Activity::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'category' => $validated['category'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'thumbnail' => $thumbnail,
            'activity_date' => $validated['activity_date'] ?? null,
            'location' => $validated['location'] ?? null,
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published'
                ? now()
                : null,
            'is_featured' => $isFeatured,
        ]);

        $this->saveNewPhotos($request, $activity);

        if ($isFeatured) {
            Activity::where('id', '!=', $activity->id)
                ->where('is_featured', true)
                ->update(['is_featured' => false]);
        }

        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Activity $activity)
    {
        $activity->load('photos');

        return view('admin.activities.edit', compact('activity'));
    }

    
    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate(
            $this->validationRules($activity)
        );

        // Simpan path gambar utama lama sebelum kegiatan diperbarui.
        $oldThumbnail = $activity->thumbnail;
        $thumbnail = $oldThumbnail;

        // Unggah gambar utama baru jika admin memilih file.
        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail')
                ->store('activities', 'public');
        }

        $isFeatured = $request->boolean('is_featured');

        $publishedAt = $activity->published_at;

        if ($validated['status'] === 'published' && !$publishedAt) {
            $publishedAt = now();
        }

        if ($validated['status'] === 'draft') {
            $publishedAt = null;
        }

        // Perbarui informasi utama kegiatan.
        $activity->update([
            'title' => $validated['title'],
            'slug' => $activity->title === $validated['title']
                ? $activity->slug
                : $this->uniqueSlug($validated['title'], $activity->id),
            'category' => $validated['category'] ?? null,
            'excerpt' => $validated['excerpt'] ?? null,
            'content' => $validated['content'],
            'thumbnail' => $thumbnail,
            'activity_date' => $validated['activity_date'] ?? null,
            'location' => $validated['location'] ?? null,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
            'is_featured' => $isFeatured,
        ]);

        // Hapus file gambar utama lama hanya jika berhasil diganti.
        if (
            $request->hasFile('thumbnail') &&
            $oldThumbnail &&
            $oldThumbnail !== $thumbnail
        ) {
            Storage::disk('public')->delete($oldThumbnail);
        }

        // Perbarui caption atau hapus foto dokumentasi yang dipilih.
        $this->updateExistingPhotos($request, $activity);

        // Tambahkan foto dokumentasi baru tanpa menghapus foto yang lama.
        $this->saveNewPhotos($request, $activity);

        if ($isFeatured) {
            Activity::where('id', '!=', $activity->id)
                ->where('is_featured', true)
                ->update(['is_featured' => false]);
        }

        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        $activity->load('photos');

        foreach ($activity->photos as $photo) {
            Storage::disk('public')->delete($photo->image);
        }

        if ($activity->thumbnail) {
            Storage::disk('public')->delete($activity->thumbnail);
        }

        $activity->delete();

        return redirect()
            ->route('admin.activities.index')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }

    private function validationRules(?Activity $activity = null): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string'],
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:10240',
            ],
            'activity_date' => ['nullable', 'date'],
            'location' => ['nullable', 'string', 'max:255'],
            'status' => ['required', 'in:draft,published'],
            'is_featured' => ['nullable', 'boolean'],

            // Foto dokumentasi baru: maksimal 20 foto per unggahan.
            'documentation_photos' => ['nullable', 'array', 'max:20'],
            'documentation_photos.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            // Caption mengikuti urutan foto yang diunggah.
            'documentation_captions' => ['nullable', 'array'],
            'documentation_captions.*' => [
                'nullable',
                'string',
                'max:500',
            ],
        ];

        if ($activity) {
            $rules['existing_captions'] = ['nullable', 'array'];
            $rules['existing_captions.*'] = [
                'nullable',
                'string',
                'max:500',
            ];

            $rules['delete_photos'] = ['nullable', 'array'];
            $rules['delete_photos.*'] = ['integer', 'distinct'];
        }

        return $rules;
    }

    private function uniqueSlug(
        string $title,
        ?int $exceptActivityId = null
    ): string {
        $baseSlug = Str::slug($title) ?: 'kegiatan';
        $slug = $baseSlug;
        $counter = 1;

        while (
            Activity::where('slug', $slug)
                ->when(
                    $exceptActivityId,
                    fn ($query) => $query->where(
                        'id',
                        '!=',
                        $exceptActivityId
                    )
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    private function saveNewPhotos(
        Request $request,
        Activity $activity
    ): void {
        $files = $request->file('documentation_photos', []);
        $captions = $request->input('documentation_captions', []);

        if (!is_array($files)) {
            return;
        }

        $nextOrder = (int) $activity->photos()
            ->max('sort_order') + 1;

        foreach ($files as $index => $file) {
            if (!$file || !$file->isValid()) {
                continue;
            }

            $path = $file->store('activities', 'public');

            $activity->photos()->create([
                'image' => $path,
                'caption' => $captions[$index] ?? null,
                'sort_order' => $nextOrder++,
            ]);
        }
    }

    private function updateExistingPhotos(
        Request $request,
        Activity $activity
    ): void {
        $captions = $request->input('existing_captions', []);
        $deleteIds = array_map(
            'intval',
            $request->input('delete_photos', [])
        );

        $photos = $activity->photos()->get();

        foreach ($photos as $photo) {
            if (in_array($photo->id, $deleteIds, true)) {
                Storage::disk('public')->delete($photo->image);
                $photo->delete();

                continue;
            }

            if (array_key_exists($photo->id, $captions)) {
                $photo->update([
                    'caption' => $captions[$photo->id],
                ]);
            }
        }
    }
}