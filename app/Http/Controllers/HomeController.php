<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Activity;
use App\Models\Program;
use App\Models\Partner;
use App\Models\ImpactStory;

class HomeController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | BERITA UTAMA
        |--------------------------------------------------------------------------
        */

        $featuredNews = News::where('status', 'published')
            ->where('is_featured', true)
            ->orderByDesc('published_at')
            ->first();

        if (! $featuredNews) {
            $featuredNews = News::where('status', 'published')
                ->orderByDesc('published_at')
                ->first();
        }


        /*
        |--------------------------------------------------------------------------
        | BERITA TERBARU
        |--------------------------------------------------------------------------
        */

        $latestNews = News::where('status', 'published')
            ->when(
                $featuredNews,
                fn ($query) =>
                    $query->where('id', '!=', $featuredNews->id)
            )
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | KEGIATAN TERBARU
        |--------------------------------------------------------------------------
        */

        $latestActivities = Activity::where('status', 'published')
            ->orderByDesc('activity_date')
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | PROGRAM
        |--------------------------------------------------------------------------
        */

        $programs = Program::where('is_active', true)
            ->orderBy('sort_order')
            ->limit(4)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | MITRA
        |--------------------------------------------------------------------------
        */

        $partners = Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->limit(6)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | CERITA DAMPAK
        |--------------------------------------------------------------------------
        */

        $impactStories = ImpactStory::where('is_active', true)
            ->where('show_on_home', true)
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'home.index',
            compact(
                'featuredNews',
                'latestNews',
                'latestActivities',
                'programs',
                'partners',
                'impactStories'
            )
        );
    }
}