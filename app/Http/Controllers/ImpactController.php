<?php

namespace App\Http\Controllers;

use App\Models\ImpactStory;

class ImpactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN DAMPAK
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $impactStories = ImpactStory::where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        return view(
            'dampak.index',
            compact('impactStories')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL CERITA DAMPAK
    |--------------------------------------------------------------------------
    */

    public function show(ImpactStory $impactStory)
    {
        /*
         * Cerita yang nonaktif tidak boleh
         * diakses melalui website publik.
         */
        abort_unless(
            $impactStory->is_active,
            404
        );

        /*
         * Cerita lain untuk rekomendasi
         * di bagian bawah halaman.
         */
        $relatedStories = ImpactStory::where('is_active', true)
            ->where('id', '!=', $impactStory->id)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        return view(
            'dampak.show',
            compact(
                'impactStory',
                'relatedStories'
            )
        );
    }
}