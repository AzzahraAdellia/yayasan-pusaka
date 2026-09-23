<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'program_id',
        'name',
        'slug',
        'title',
        'short_description',
        'description',
        'target_participants',
        'image',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function batches()
    {
        return $this->hasMany(TrainingBatch::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}