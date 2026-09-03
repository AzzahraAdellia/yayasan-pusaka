<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $newsCount = News::count();

        $publishedNewsCount = News::where(
            'status',
            'published'
        )->count();

        $draftNewsCount = News::where(
            'status',
            'draft'
        )->count();

        $userCount = User::count();

        $staffCount = User::where(
            'role',
            'staff'
        )->count();

        $latestNews = News::latest()
            ->take(5)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'newsCount',
                'publishedNewsCount',
                'draftNewsCount',
                'userCount',
                'staffCount',
                'latestNews'
            )
        );
    }
}