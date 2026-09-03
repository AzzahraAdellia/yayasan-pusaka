<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Daftar berita.
     */
    public function index()
    {
        $news = News::latest()->paginate(10);

        return view('admin.news.index', compact('news'));
    }


    /**
     * Form tambah berita.
     */
    public function create()
    {
        return view('admin.news.create');
    }


    /**
     * Simpan berita.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],

            'content' => [
                'required',
                'string',
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        $baseSlug = Str::slug($validated['title']);

        $slug = $baseSlug;

        $counter = 1;

        while (News::where('slug', $slug)->exists()) {

            $slug = $baseSlug . '-' . $counter;

            $counter++;
        }


        /*
        |--------------------------------------------------------------------------
        | THUMBNAIL
        |--------------------------------------------------------------------------
        */

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request
                ->file('thumbnail')
                ->store('news', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | CREATE
        |--------------------------------------------------------------------------
        */

        News::create([
            'title' => $validated['title'],

            'slug' => $slug,

            'category' => $validated['category'] ?? null,

            'excerpt' => $validated['excerpt'] ?? null,

            'content' => $validated['content'],

            'thumbnail' => $thumbnail,

            'status' => $validated['status'],

            'published_at' =>
                $validated['status'] === 'published'
                    ? now()
                    : null,
        ]);


        return redirect()
            ->route('admin.news.index')
            ->with(
                'success',
                'Berita berhasil ditambahkan.'
            );
    }


    /**
     * Form edit.
     */
    public function edit(News $news)
    {
        return view(
            'admin.news.edit',
            compact('news')
        );
    }


    /**
     * Update berita.
     */
    public function update(
        Request $request,
        News $news
    ) {

        $validated = $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'category' => [
                'nullable',
                'string',
                'max:100',
            ],

            'excerpt' => [
                'nullable',
                'string',
                'max:500',
            ],

            'content' => [
                'required',
                'string',
            ],

            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        if ($news->title !== $validated['title']) {

            $baseSlug = Str::slug(
                $validated['title']
            );

            $slug = $baseSlug;

            $counter = 1;

            while (
                News::where('slug', $slug)
                    ->where('id', '!=', $news->id)
                    ->exists()
            ) {

                $slug =
                    $baseSlug . '-' . $counter;

                $counter++;
            }

        } else {

            $slug = $news->slug;
        }


        /*
        |--------------------------------------------------------------------------
        | THUMBNAIL
        |--------------------------------------------------------------------------
        */

        $thumbnail = $news->thumbnail;

        if ($request->hasFile('thumbnail')) {

            if (
                $news->thumbnail &&
                Storage::disk('public')
                    ->exists($news->thumbnail)
            ) {

                Storage::disk('public')
                    ->delete($news->thumbnail);
            }

            $thumbnail = $request
                ->file('thumbnail')
                ->store('news', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | PUBLISHED DATE
        |--------------------------------------------------------------------------
        */

        $publishedAt =
            $news->published_at;

        if (
            $validated['status'] === 'published' &&
            !$publishedAt
        ) {

            $publishedAt = now();
        }

        if (
            $validated['status'] === 'draft'
        ) {

            $publishedAt = null;
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $news->update([
            'title' => $validated['title'],

            'slug' => $slug,

            'category' =>
                $validated['category'] ?? null,

            'excerpt' =>
                $validated['excerpt'] ?? null,

            'content' =>
                $validated['content'],

            'thumbnail' =>
                $thumbnail,

            'status' =>
                $validated['status'],

            'published_at' =>
                $publishedAt,
        ]);


        return redirect()
            ->route('admin.news.index')
            ->with(
                'success',
                'Berita berhasil diperbarui.'
            );
    }


    /**
     * Hapus berita.
     */
    public function destroy(News $news)
    {
        if (
            $news->thumbnail &&
            Storage::disk('public')
                ->exists($news->thumbnail)
        ) {

            Storage::disk('public')
                ->delete($news->thumbnail);
        }

        $news->delete();


        return redirect()
            ->route('admin.news.index')
            ->with(
                'success',
                'Berita berhasil dihapus.'
            );
    }
}