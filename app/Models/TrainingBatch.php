<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingBatch extends Model
{
    protected $fillable = [
        'training_id',
        'name',
        'start_date',
        'end_date',
        'location',
        'participants',
        'participant_count',
        'description',
        'sort_order',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'participant_count' => 'integer',
        'sort_order' => 'integer',
    ];

    public function training()
    {
        return $this->belongsTo(Training::class);
    }

    public function photos()
    {
        return $this->hasMany(TrainingBatchPhoto::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}