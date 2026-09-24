<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TrainingController extends Controller
{
    /**
     * Daftar subkegiatan.
     * Halaman ini masih dipertahankan sementara untuk menu lama.
     */
    public function index()
    {
        $program = Program::where('slug', 'pelatihan-pengembangan')
            ->firstOrFail();

        $trainings = $program->trainings()
            ->withCount('batches')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'admin.trainings.index',
            compact('program', 'trainings')
        );
    }

    /**
     * Form tambah subkegiatan.
     * Program mengikuti kartu Program yang dipilih.
     */
    public function create(Request $request)
    {
        $program = Program::findOrFail(
            $request->query('program_id')
        );

        return view(
            'admin.trainings.create',
            compact('program')
        );
    }

    /**
     * Simpan subkegiatan ke program yang dipilih.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_id' => [
                'required',
                'integer',
                Rule::exists('programs', 'id'),
            ],
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'target_participants' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $program = Program::findOrFail($validated['program_id']);

        $slug = Str::slug($validated['name']);
        $baseSlug = $slug ?: 'subkegiatan';
        $slug = $baseSlug;
        $number = 2;

        while (Training::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $number;
            $number++;
        }

        $validated['program_id'] = $program->id;
        $validated['slug'] = $slug;
        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('trainings', 'public');
        }

        $training = Training::create($validated);

        return redirect()
            ->route('admin.programs.edit', $program)
            ->with('success', 'Subkegiatan berhasil ditambahkan.');
    }

    /**
     * Form edit subkegiatan dan batch.
     */
    public function edit(Training $training)
    {
        $program = $training->program;

        $training->load('batches.photos');

        return view(
            'admin.trainings.edit',
            compact('program', 'training')
        );
    }

    /**
     * Perbarui subkegiatan.
     */
    public function update(Request $request, Training $training)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description' => ['nullable', 'string'],
            'target_participants' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $oldImage = $training->image;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('trainings', 'public');
        } else {
            unset($validated['image']);
        }

        $training->update($validated);

        if ($request->hasFile('image') && $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return redirect()
            ->route('admin.trainings.edit', $training)
            ->with('success', 'Subkegiatan berhasil diperbarui.');
    }

    /**
     * Hapus subkegiatan jika belum memiliki batch.
     */
    public function destroy(Training $training)
    {
        $program = $training->program;

        if ($training->batches()->exists()) {
            return redirect()
                ->route('admin.programs.edit', $program)
                ->with(
                    'error',
                    'Subkegiatan masih memiliki batch. Hapus batch terlebih dahulu.'
                );
        }

        $image = $training->image;

        $training->delete();

        if ($image) {
            Storage::disk('public')->delete($image);
        }

        return redirect()
            ->route('admin.programs.edit', $program)
            ->with('success', 'Subkegiatan berhasil dihapus.');
    }
}