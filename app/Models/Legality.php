<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Legality extends Model
{
    protected $fillable = [
        'title',
        'document_number',
        'document_date',
        'description',
        'file',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'document_date' => 'date',
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}