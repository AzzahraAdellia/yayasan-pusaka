<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedUmkm extends Model
{
    protected $fillable = [
        'business_name',
        'product_name',
        'description',
        'image',
        'address',
        'whatsapp',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}