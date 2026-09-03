<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $featuredNews = News::where('status', 'published')
            ->where('is_featured', true)
            ->orderByDesc('published_at')
            ->first();

        if (! $featuredNews) {
            $featuredNews = News::where('status', 'published')
                ->orderByDesc('published_at')
                ->first();
        }

        $news = News::where('status', 'published')
            ->when(
                $featuredNews,
                fn ($query) =>
                    $query->where('id', '!=', $featuredNews->id)
            )
            ->orderByDesc('published_at')
            ->paginate(6);

        return view(
            'informasi.berita',
            compact(
                'featuredNews',
                'news'
            )
        );
    }


    public function show(string $slug)
    {
        $newsItem = News::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedNews = News::where('status', 'published')
            ->where('id', '!=', $newsItem->id)
            ->when(
                $newsItem->category,
                fn ($query) =>
                    $query->where('category', $newsItem->category)
            )
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view(
            'informasi.berita-detail',
            compact(
                'newsItem',
                'relatedNews'
            )
        );
    }
}