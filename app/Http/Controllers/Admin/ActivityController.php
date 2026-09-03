<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    /**
     * Daftar kegiatan.
     */
    public function index()
    {
        $activities = Activity::latest('activity_date')
            ->latest()
            ->paginate(10);

        return view(
            'admin.activities.index',
            compact('activities')
        );
    }


    /**
     * Form tambah kegiatan.
     */
    public function create()
    {
        return view('admin.activities.create');
    }


    /**
     * Simpan kegiatan.
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

            'activity_date' => [
                'nullable',
                'date',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
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

        while (
            Activity::where('slug', $slug)->exists()
        ) {
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
                ->store('activities', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | FEATURED
        |--------------------------------------------------------------------------
        */

        $isFeatured = $request->boolean('is_featured');

        // Hanya satu kegiatan yang dijadikan unggulan.
        if ($isFeatured) {
            Activity::where('is_featured', true)
                ->update([
                    'is_featured' => false,
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | CREATE
        |--------------------------------------------------------------------------
        */

        Activity::create([
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

            'activity_date' =>
                $validated['activity_date'] ?? null,

            'location' =>
                $validated['location'] ?? null,

            'status' =>
                $validated['status'],

            'published_at' =>
                $validated['status'] === 'published'
                    ? now()
                    : null,

            'is_featured' =>
                $isFeatured,
        ]);


        return redirect()
            ->route('admin.activities.index')
            ->with(
                'success',
                'Kegiatan berhasil ditambahkan.'
            );
    }


    /**
     * Form edit kegiatan.
     */
    public function edit(Activity $activity)
    {
        return view(
            'admin.activities.edit',
            compact('activity')
        );
    }


    /**
     * Update kegiatan.
     */
    public function update(
        Request $request,
        Activity $activity
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

            'activity_date' => [
                'nullable',
                'date',
            ],

            'location' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                'in:draft,published',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | SLUG
        |--------------------------------------------------------------------------
        */

        if ($activity->title !== $validated['title']) {

            $baseSlug = Str::slug(
                $validated['title']
            );

            $slug = $baseSlug;

            $counter = 1;

            while (
                Activity::where('slug', $slug)
                    ->where('id', '!=', $activity->id)
                    ->exists()
            ) {
                $slug =
                    $baseSlug . '-' . $counter;

                $counter++;
            }

        } else {
            $slug = $activity->slug;
        }


        /*
        |--------------------------------------------------------------------------
        | THUMBNAIL
        |--------------------------------------------------------------------------
        */

        $thumbnail = $activity->thumbnail;

        if ($request->hasFile('thumbnail')) {

            if (
                $activity->thumbnail &&
                Storage::disk('public')
                    ->exists($activity->thumbnail)
            ) {
                Storage::disk('public')
                    ->delete($activity->thumbnail);
            }

            $thumbnail = $request
                ->file('thumbnail')
                ->store('activities', 'public');
        }


        /*
        |--------------------------------------------------------------------------
        | PUBLISHED DATE
        |--------------------------------------------------------------------------
        */

        $publishedAt =
            $activity->published_at;

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
        | FEATURED
        |--------------------------------------------------------------------------
        */

        $isFeatured =
            $request->boolean('is_featured');

        if ($isFeatured) {
            Activity::where('id', '!=', $activity->id)
                ->where('is_featured', true)
                ->update([
                    'is_featured' => false,
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $activity->update([
            'title' =>
                $validated['title'],

            'slug' =>
                $slug,

            'category' =>
                $validated['category'] ?? null,

            'excerpt' =>
                $validated['excerpt'] ?? null,

            'content' =>
                $validated['content'],

            'thumbnail' =>
                $thumbnail,

            'activity_date' =>
                $validated['activity_date'] ?? null,

            'location' =>
                $validated['location'] ?? null,

            'status' =>
                $validated['status'],

            'published_at' =>
                $publishedAt,

            'is_featured' =>
                $isFeatured,
        ]);


        return redirect()
            ->route('admin.activities.index')
            ->with(
                'success',
                'Kegiatan berhasil diperbarui.'
            );
    }


    /**
     * Hapus kegiatan.
     */
    public function destroy(Activity $activity)
    {
        if (
            $activity->thumbnail &&
            Storage::disk('public')
                ->exists($activity->thumbnail)
        ) {
            Storage::disk('public')
                ->delete($activity->thumbnail);
        }

        $activity->delete();


        return redirect()
            ->route('admin.activities.index')
            ->with(
                'success',
                'Kegiatan berhasil dihapus.'
            );
    }
}