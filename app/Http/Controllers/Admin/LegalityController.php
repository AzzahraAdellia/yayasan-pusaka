<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Legality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegalityController extends Controller
{
    /**
     * Daftar legalitas.
     */
    public function index()
    {
        $legalities = Legality::orderBy('sort_order')
            ->latest()
            ->get();

        return view(
            'admin.legalities.index',
            compact('legalities')
        );
    }


    /**
     * Form tambah legalitas.
     */
    public function create()
    {
        return view('admin.legalities.create');
    }


    /**
     * Simpan legalitas.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'document_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'document_date' => [
                'nullable',
                'date',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
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


        $file = null;

        if ($request->hasFile('file')) {
            $file = $request
                ->file('file')
                ->store('legalities', 'public');
        }


        Legality::create([
            'title' =>
                $validated['title'],

            'document_number' =>
                $validated['document_number'] ?? null,

            'document_date' =>
                $validated['document_date'] ?? null,

            'description' =>
                $validated['description'] ?? null,

            'file' =>
                $file,

            'sort_order' =>
                $validated['sort_order'],

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return redirect()
            ->route('admin.legalities.index')
            ->with(
                'success',
                'Data legalitas berhasil ditambahkan.'
            );
    }


    /**
     * Form edit legalitas.
     */
    public function edit(Legality $legality)
    {
        return view(
            'admin.legalities.edit',
            compact('legality')
        );
    }


    /**
     * Update legalitas.
     */
    public function update(
        Request $request,
        Legality $legality
    ) {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'document_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'document_date' => [
                'nullable',
                'date',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'file' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
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


        $file = $legality->file;

        if ($request->hasFile('file')) {

            if (
                $legality->file &&
                Storage::disk('public')
                    ->exists($legality->file)
            ) {
                Storage::disk('public')
                    ->delete($legality->file);
            }

            $file = $request
                ->file('file')
                ->store('legalities', 'public');
        }


        $legality->update([
            'title' =>
                $validated['title'],

            'document_number' =>
                $validated['document_number'] ?? null,

            'document_date' =>
                $validated['document_date'] ?? null,

            'description' =>
                $validated['description'] ?? null,

            'file' =>
                $file,

            'sort_order' =>
                $validated['sort_order'],

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return redirect()
            ->route('admin.legalities.index')
            ->with(
                'success',
                'Data legalitas berhasil diperbarui.'
            );
    }


    /**
     * Hapus legalitas.
     */
    public function destroy(Legality $legality)
    {
        if (
            $legality->file &&
            Storage::disk('public')
                ->exists($legality->file)
        ) {
            Storage::disk('public')
                ->delete($legality->file);
        }

        $legality->delete();


        return redirect()
            ->route('admin.legalities.index')
            ->with(
                'success',
                'Data legalitas berhasil dihapus.'
            );
    }
}