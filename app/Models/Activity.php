<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'thumbnail',
        'activity_date',
        'location',
        'status',
        'published_at',
        'is_featured',
    ];

    protected $casts = [
        'activity_date' => 'date',
        'published_at' => 'datetime',
        'is_featured' => 'boolean',
    ];

    /**
     * Satu kegiatan memiliki banyak foto dokumentasi.
     */
    public function photos(): HasMany
    {
        return $this->hasMany(ActivityPhoto::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}