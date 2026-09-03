<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Daftar mitra.
     */
    public function index()
    {
        $partners = Partner::orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view(
            'admin.partners.index',
            compact('partners')
        );
    }


    /**
     * Form tambah mitra.
     */
    public function create()
    {
        return view('admin.partners.create');
    }


    /**
     * Simpan mitra baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'website' => [
                'nullable',
                'url',
                'max:255',
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


        $logo = null;

        if ($request->hasFile('logo')) {
            $logo = $request
                ->file('logo')
                ->store('partners', 'public');
        }


        Partner::create([
            'name' => $validated['name'],

            'description' =>
                $validated['description'] ?? null,

            'logo' => $logo,

            'website' =>
                $validated['website'] ?? null,

            'sort_order' =>
                $validated['sort_order'],

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return redirect()
            ->route('admin.partners.index')
            ->with(
                'success',
                'Mitra berhasil ditambahkan.'
            );
    }


    /**
     * Form edit mitra.
     */
    public function edit(Partner $partner)
    {
        return view(
            'admin.partners.edit',
            compact('partner')
        );
    }


    /**
     * Update mitra.
     */
    public function update(
        Request $request,
        Partner $partner
    ) {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'logo' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],

            'website' => [
                'nullable',
                'url',
                'max:255',
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


        $logo = $partner->logo;

        if ($request->hasFile('logo')) {

            if (
                $partner->logo &&
                Storage::disk('public')->exists($partner->logo)
            ) {
                Storage::disk('public')->delete($partner->logo);
            }

            $logo = $request
                ->file('logo')
                ->store('partners', 'public');
        }


        $partner->update([
            'name' => $validated['name'],

            'description' =>
                $validated['description'] ?? null,

            'logo' => $logo,

            'website' =>
                $validated['website'] ?? null,

            'sort_order' =>
                $validated['sort_order'],

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return redirect()
            ->route('admin.partners.index')
            ->with(
                'success',
                'Mitra berhasil diperbarui.'
            );
    }


    /**
     * Hapus mitra.
     */
    public function destroy(Partner $partner)
    {
        if (
            $partner->logo &&
            Storage::disk('public')->exists($partner->logo)
        ) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();


        return redirect()
            ->route('admin.partners.index')
            ->with(
                'success',
                'Mitra berhasil dihapus.'
            );
    }
}