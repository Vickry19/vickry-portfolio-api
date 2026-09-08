<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutStatistic extends Model
{
    protected $fillable = [
        'value',
        'label',
        'suffix',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}