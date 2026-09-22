<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Halaman kegiatan berdasarkan tahun.
     */
    public function index(Request $request)
    {
        $driver = DB::connection()->getDriverName();

        $yearExpression = $driver === 'sqlite'
            ? "strftime('%Y', activity_date)"
            : 'YEAR(activity_date)';

        /*
        |--------------------------------------------------------------------------
        | DAFTAR TAHUN KEGIATAN
        |--------------------------------------------------------------------------
        */

        $activityYears = Activity::query()
            ->where('status', 'published')
            ->whereNotNull('activity_date')
            ->selectRaw("{$yearExpression} AS year")
            ->selectRaw('COUNT(*) AS total')
            ->groupByRaw($yearExpression)
            ->orderByDesc('year')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | TAHUN YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $selectedYear = $request->query('tahun');

        if ($selectedYear !== null) {
            abort_unless(
                is_string($selectedYear)
                && preg_match('/^\d{4}$/', $selectedYear),
                404
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DAFTAR KEGIATAN PER TAHUN
        |--------------------------------------------------------------------------
        */

        $activities = null;

        if ($selectedYear !== null) {
            $activities = Activity::query()
                ->where('status', 'published')
                ->whereYear('activity_date', $selectedYear)
                ->orderByDesc('activity_date')
                ->orderByDesc('published_at')
                ->paginate(9)
                ->withQueryString();
        }

        /*
        |--------------------------------------------------------------------------
        | KEGIATAN UNGGULAN
        |--------------------------------------------------------------------------
        */

        $featuredActivity = Activity::query()
            ->where('status', 'published')
            ->where('is_featured', true)
            ->orderByDesc('activity_date')
            ->orderByDesc('published_at')
            ->first();

        if (!$featuredActivity) {
            $featuredActivity = Activity::query()
                ->where('status', 'published')
                ->orderByDesc('activity_date')
                ->orderByDesc('published_at')
                ->first();
        }

        return view('informasi.kegiatan', compact(
            'activityYears',
            'selectedYear',
            'activities',
            'featuredActivity'
        ));
    }

    /**
     * Halaman detail kegiatan beserta foto dokumentasi.
     */
    public function show(string $slug)
    {
        /*
        |--------------------------------------------------------------------------
        | DETAIL KEGIATAN + FOTO DOKUMENTASI
        |--------------------------------------------------------------------------
        */

        $activity = Activity::query()
            ->with('photos')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | KEGIATAN TERKAIT
        |--------------------------------------------------------------------------
        */

        $relatedActivities = Activity::query()
            ->where('status', 'published')
            ->where('id', '!=', $activity->id)
            ->when(
                $activity->category,
                fn ($query) => $query->where(
                    'category',
                    $activity->category
                )
            )
            ->orderByDesc('activity_date')
            ->limit(3)
            ->get();

        return view('informasi.kegiatan-detail', compact(
            'activity',
            'relatedActivities'
        ));
    }
}