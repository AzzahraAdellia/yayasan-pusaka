<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ImpactStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImpactStoryController extends Controller
{
    public function index()
    {
        $stories = ImpactStory::query()
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('admin.impact-stories.index', compact('stories'));
    }

    public function create()
    {
        return view('admin.impact-stories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'beneficiary_name' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['slug'] = $this->generateUniqueSlug(
            $validated['title']
        );

        $validated['show_on_home'] = $request->boolean('show_on_home');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('impact-stories', 'public');
        }

        ImpactStory::create($validated);

        return redirect()
            ->route('admin.impact-stories.index')
            ->with('success', 'Cerita dampak berhasil ditambahkan.');
    }

    public function show(ImpactStory $impactStory)
    {
        return redirect()
            ->route('admin.impact-stories.edit', $impactStory);
    }

    public function edit(ImpactStory $impactStory)
    {
        return view(
            'admin.impact-stories.edit',
            compact('impactStory')
        );
    }

    public function update(Request $request, ImpactStory $impactStory)
    {
        $validated = $request->validate([
            'category' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'beneficiary_name' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        if ($impactStory->title !== $validated['title']) {
            $validated['slug'] = $this->generateUniqueSlug(
                $validated['title'],
                $impactStory->id
            );
        }

        $validated['show_on_home'] = $request->boolean('show_on_home');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('image')) {
            if (
                $impactStory->image &&
                Storage::disk('public')->exists($impactStory->image)
            ) {
                Storage::disk('public')->delete($impactStory->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('impact-stories', 'public');
        }

        $impactStory->update($validated);

        return redirect()
            ->route('admin.impact-stories.index')
            ->with('success', 'Cerita dampak berhasil diperbarui.');
    }

    public function destroy(ImpactStory $impactStory)
    {
        if (
            $impactStory->image &&
            Storage::disk('public')->exists($impactStory->image)
        ) {
            Storage::disk('public')->delete($impactStory->image);
        }

        $impactStory->delete();

        return redirect()
            ->route('admin.impact-stories.index')
            ->with('success', 'Cerita dampak berhasil dihapus.');
    }

    private function generateUniqueSlug(
        string $title,
        ?int $ignoreId = null
    ): string {
        $baseSlug = Str::slug($title);

        if ($baseSlug === '') {
            $baseSlug = 'cerita-dampak';
        }

        $slug = $baseSlug;
        $counter = 2;

        while (
            ImpactStory::query()
                ->where('slug', $slug)
                ->when(
                    $ignoreId,
                    fn ($query) => $query->where('id', '!=', $ignoreId)
                )
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }
}