<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturedUmkmController extends Controller
{
    public function index()
    {
        $umkms = FeaturedUmkm::orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10);

        return view('admin.featured-umkm.index', compact('umkms'));
    }

    public function create()
    {
        return view('admin.featured-umkm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'address' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:20',
            'is_active' => 'sometimes|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('featured-umkm', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        FeaturedUmkm::create($validated);

        return redirect()
            ->route('admin.featured-umkm.index')
            ->with('success', 'UMKM unggulan berhasil ditambahkan.');
    }

    public function edit(FeaturedUmkm $featuredUmkm)
    {
        return view('admin.featured-umkm.edit', compact('featuredUmkm'));
    }

    public function update(Request $request, FeaturedUmkm $featuredUmkm)
    {
        $validated = $request->validate([
            'business_name' => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'address' => 'nullable|string',
            'whatsapp' => 'nullable|string|max:20',
            'is_active' => 'sometimes|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $newImage = $request->file('image')
                ->store('featured-umkm', 'public');

            if ($featuredUmkm->image) {
                Storage::disk('public')->delete($featuredUmkm->image);
            }

            $validated['image'] = $newImage;
        }

        $validated['is_active'] = $request->boolean('is_active');

        $featuredUmkm->update($validated);

        return redirect()
            ->route('admin.featured-umkm.index')
            ->with('success', 'UMKM unggulan berhasil diperbarui.');
    }

    public function destroy(FeaturedUmkm $featuredUmkm)
    {
        $featuredUmkm->delete();

        if ($featuredUmkm->image) {
            Storage::disk('public')->delete($featuredUmkm->image);
        }

        return redirect()
            ->route('admin.featured-umkm.index')
            ->with('success', 'UMKM unggulan berhasil dihapus.');
    }
}