<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteVisit extends Model
{
    protected $fillable = [
        'visitor_id',
        'path',
        'country_code',
        'country_name',
        'device_type',
    ];
}