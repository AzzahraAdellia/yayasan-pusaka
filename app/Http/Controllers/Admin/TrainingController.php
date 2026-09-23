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
    private function trainingProgram(): Program
    {
        return Program::where('slug', 'pelatihan-pengembangan')
            ->firstOrFail();
    }

    public function index()
    {
        $program = $this->trainingProgram();

        $trainings = $program->trainings()
            ->withCount('batches')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.trainings.index', compact('program', 'trainings'));
    }

    public function create()
    {
        $program = $this->trainingProgram();

        return view('admin.trainings.create', compact('program'));
    }

    public function store(Request $request)
    {
        $program = $this->trainingProgram();

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

        $slug = Str::slug($validated['name']);
        $baseSlug = $slug ?: 'pelatihan';
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
            ->route('admin.trainings.edit', $training)
            ->with('success', 'Pelatihan berhasil ditambahkan.');
    }

    public function edit(Training $training)
    {
        $program = $this->trainingProgram();

        abort_unless($training->program_id === $program->id, 404);

        $training->load('batches.photos');

        return view('admin.trainings.edit', compact('program', 'training'));
    }

    public function update(Request $request, Training $training)
    {
        $program = $this->trainingProgram();

        abort_unless($training->program_id === $program->id, 404);

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
            ->with('success', 'Pelatihan berhasil diperbarui.');
    }

    public function destroy(Training $training)
    {
        $program = $this->trainingProgram();

        abort_unless($training->program_id === $program->id, 404);

        if ($training->batches()->exists()) {
            return redirect()
                ->route('admin.trainings.index')
                ->with(
                    'error',
                    'Pelatihan masih memiliki batch. Hapus batch terlebih dahulu.'
                );
        }

        $image = $training->image;

        $training->delete();

        if ($image) {
            Storage::disk('public')->delete($image);
        }

        return redirect()
            ->route('admin.trainings.index')
            ->with('success', 'Pelatihan berhasil dihapus.');
    }
}