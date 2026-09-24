<?php

namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    /**
     * Halaman utama program.
     */
    public function index()
    {
        $programs = Program::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view(
            'program.index',
            compact('programs')
        );
    }


    /**
     * Program Pendidikan.
     */
    public function education()
    {
        $program = Program::where('slug', 'pendidikan')
            ->where('is_active', true)
            ->firstOrFail();

        $trainings = $program->trainings()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'program.pendidikan',
            compact('program', 'trainings')
        );
    }


    /**
     * Program Sosial & Kemanusiaan.
     */
    public function social()
    {
        $program = Program::where('slug', 'sosial-kemanusiaan')
            ->where('is_active', true)
            ->firstOrFail();

        $trainings = $program->trainings()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'program.sosial',
            compact('program', 'trainings')
        );
    }


    /**
     * Program Pemberdayaan.
     */
    public function empowerment()
    {
        $program = Program::where('slug', 'pemberdayaan')
            ->where('is_active', true)
            ->firstOrFail();

        $trainings = $program->trainings()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'program.pemberdayaan',
            compact('program', 'trainings')
        );
    }


    /**
     * Program Pelatihan & Pengembangan.
     */
    public function training()
    {
        $program = Program::where('slug', 'pelatihan-pengembangan')
            ->where('is_active', true)
            ->firstOrFail();

        $trainings = $program->trainings()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'program.pelatihan',
            compact('program', 'trainings')
        );
    }
}