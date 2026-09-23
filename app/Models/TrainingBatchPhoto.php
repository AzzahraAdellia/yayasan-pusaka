<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingBatchPhoto extends Model
{
    protected $fillable = [
        'training_batch_id',
        'image',
        'caption',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function batch()
    {
        return $this->belongsTo(TrainingBatch::class, 'training_batch_id');
    }
}