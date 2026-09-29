<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImpactStory extends Model
{
    protected $fillable = [
        'category',
        'title',
        'slug',
        'beneficiary_name',
        'subtitle',
        'excerpt',
        'content',
        'image',
        'show_on_home',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'show_on_home' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}