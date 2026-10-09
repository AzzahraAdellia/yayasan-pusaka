<?php

namespace App\Http\Controllers;

use App\Models\ImpactStory;
use App\Services\PublicStatisticsService;

class ImpactController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN DAMPAK
    |--------------------------------------------------------------------------
    */

    public function index(PublicStatisticsService $statisticsService)
    {
        /*
         * Mengambil seluruh Cerita Dampak
         * yang aktif untuk ditampilkan.
         */
        $impactStories = ImpactStory::where('is_active', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->get();

        /*
         * Mengambil statistik dari API
         * Sistem Informasi Internal Yayasan Pusaka.
         */
        $publicStats = $statisticsService->get();

        return view(
            'dampak.index',
            compact(
                'impactStories',
                'publicStats'
            )
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
