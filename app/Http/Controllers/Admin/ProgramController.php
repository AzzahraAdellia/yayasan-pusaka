<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Daftar program.
     */
    public function index()
    {
        $programs = Program::orderBy('sort_order')
            ->get();

        return view(
            'admin.programs.index',
            compact('programs')
        );
    }


    /**
     * Form edit program beserta daftar subkegiatannya.
     */
    public function edit(Program $program)
    {
        $subactivities = $program->trainings()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'admin.programs.edit',
            compact('program', 'subactivities')
        );
    }


    /**
     * Update program.
     */
    public function update(
        Request $request,
        Program $program
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:100',
            ],

            'sort_order' => [
                'required',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | IMAGE
        |--------------------------------------------------------------------------
        */

        $image = $program->image;

        if ($request->hasFile('image')) {

            if (
                $program->image &&
                Storage::disk('public')
                    ->exists($program->image)
            ) {
                Storage::disk('public')
                    ->delete($program->image);
            }

            $image = $request
                ->file('image')
                ->store('programs', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $program->update([
            'name' =>
                $validated['name'],

            'title' =>
                $validated['title'],

            'short_description' =>
                $validated['short_description'] ?? null,

            'description' =>
                $validated['description'] ?? null,

            'image' =>
                $image,

            'icon' =>
                $validated['icon'] ?? null,

            'sort_order' =>
                $validated['sort_order'],

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return redirect()
            ->route('admin.programs.index')
            ->with(
                'success',
                'Program berhasil diperbarui.'
            );
    }
}