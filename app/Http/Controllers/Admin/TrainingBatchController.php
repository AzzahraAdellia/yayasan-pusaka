<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingBatch;
use App\Models\TrainingBatchPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TrainingBatchController extends Controller
{
    public function store(Request $request, Training $training)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'start_time' => ['nullable', 'date_format:H:i'],
            'end_time' => ['nullable', 'date_format:H:i'],
            'location' => ['nullable', 'string', 'max:255'],
            'participants' => ['nullable', 'string', 'max:255'],
            'participant_count' => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'max:10240'],
        ]);

        $photos = $request->file('photos', []);

        unset($validated['photos']);

        $batch = $training->batches()->create($validated);

        foreach ($photos as $index => $photo) {
            $batch->photos()->create([
                'image' => $photo->store('training-batches', 'public'),
                'sort_order' => $index,
            ]);
        }

        return redirect()
            ->route('admin.trainings.edit', $training)
            ->with('success', 'Batch berhasil ditambahkan.');
    }

    public function update(
        Request $request,
        Training $training,
        TrainingBatch $batch
    ) {
        abort_unless($batch->training_id === $training->id, 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'start_time' => ['nullable', 'date_format:H:i'],
            'end_time' => ['nullable', 'date_format:H:i'],
            'location' => ['nullable', 'string', 'max:255'],
            'participants' => ['nullable', 'string', 'max:255'],
            'participant_count' => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'photos' => ['nullable', 'array'],
            'photos.*' => ['image', 'max:10240'],
        ]);

        $photos = $request->file('photos', []);

        unset($validated['photos']);

        $batch->update($validated);

        $nextSortOrder = (int) $batch->photos()->max('sort_order') + 1;

        foreach ($photos as $index => $photo) {
            $batch->photos()->create([
                'image' => $photo->store('training-batches', 'public'),
                'sort_order' => $nextSortOrder + $index,
            ]);
        }

        return redirect()
            ->route('admin.trainings.edit', $training)
            ->with('success', 'Batch berhasil diperbarui.');
    }

    public function destroy(Training $training, TrainingBatch $batch)
    {
        abort_unless($batch->training_id === $training->id, 404);

        foreach ($batch->photos as $photo) {
            Storage::disk('public')->delete($photo->image);
        }

        $batch->delete();

        return redirect()
            ->route('admin.trainings.edit', $training)
            ->with('success', 'Batch berhasil dihapus.');
    }

    public function destroyPhoto(
        Training $training,
        TrainingBatch $batch,
        TrainingBatchPhoto $photo
    ) {
        abort_unless($batch->training_id === $training->id, 404);
        abort_unless($photo->training_batch_id === $batch->id, 404);

        Storage::disk('public')->delete($photo->image);

        $photo->delete();

        return redirect()
            ->route('admin.trainings.edit', $training)
            ->with('success', 'Foto dokumentasi berhasil dihapus.');
    }
}