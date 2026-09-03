<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Activity;
use App\Models\Setting;

class InformationController extends Controller
{
    public function index()
    {
        $latestNews = News::where('status', 'published')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();

        $latestActivities = Activity::where('status', 'published')
            ->orderByDesc('activity_date')
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        $settings = Setting::pluck('value', 'key');

        return view(
            'informasi.index',
            compact(
                'latestNews',
                'latestActivities',
                'settings'
            )
        );
    }
}