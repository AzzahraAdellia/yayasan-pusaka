<?php

namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends Controller
{
    /**
     * Daftar kegiatan publik.
     */
    public function index()
    {
        $featuredActivity = Activity::where('status', 'published')
            ->where('is_featured', true)
            ->orderByDesc('activity_date')
            ->orderByDesc('published_at')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | FALLBACK FEATURED
        |--------------------------------------------------------------------------
        */

        if (!$featuredActivity) {

            $featuredActivity = Activity::where('status', 'published')
                ->orderByDesc('activity_date')
                ->orderByDesc('published_at')
                ->first();
        }


        /*
        |--------------------------------------------------------------------------
        | DAFTAR KEGIATAN
        |--------------------------------------------------------------------------
        */

        $activities = Activity::where('status', 'published')
            ->when(
                $featuredActivity,
                fn ($query) =>
                    $query->where('id', '!=', $featuredActivity->id)
            )
            ->orderByDesc('activity_date')
            ->orderByDesc('published_at')
            ->paginate(6);


        return view(
            'informasi.kegiatan',
            compact(
                'featuredActivity',
                'activities'
            )
        );
    }


    /**
     * Detail kegiatan publik.
     */
    public function show(string $slug)
    {
        $activity = Activity::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | KEGIATAN LAINNYA
        |--------------------------------------------------------------------------
        */

        $relatedActivities = Activity::where('status', 'published')
            ->where('id', '!=', $activity->id)
            ->when(
                $activity->category,
                fn ($query) =>
                    $query->where('category', $activity->category)
            )
            ->orderByDesc('activity_date')
            ->limit(3)
            ->get();


        return view(
            'informasi.kegiatan-detail',
            compact(
                'activity',
                'relatedActivities'
            )
        );
    }
}