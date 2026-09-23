<?php

namespace App\Http\Controllers;

use App\Models\Training;

class TrainingController extends Controller
{
    public function show(Training $training)
    {
        abort_unless(
            $training->is_active && $training->program->is_active,
            404
        );

        $training->load('batches.photos');

        return view(
            'program.training-detail',
            compact('training')
        );
    }
}