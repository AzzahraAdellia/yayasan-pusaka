<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function show(Request $request, Training $training)
    {
        abort_unless(
            $training->is_active && $training->program->is_active,
            404
        );

        $programSlugByRoute = [
            'programs.education.show' => 'pendidikan',
            'programs.social.show' => 'sosial-kemanusiaan',
            'programs.empowerment.show' => 'pemberdayaan',
            'programs.training.show' => 'pelatihan-pengembangan',
        ];

        $expectedProgramSlug = $programSlugByRoute[$request->route()->getName()] ?? null;

        abort_unless(
            $expectedProgramSlug !== null
            && $training->program->slug === $expectedProgramSlug,
            404
        );

        $training->load('batches.photos');

        return view(
            'program.training-detail',
            compact('training')
        );
    }
}