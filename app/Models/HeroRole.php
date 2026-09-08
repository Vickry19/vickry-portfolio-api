<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroRole extends Model
{
    protected $fillable = [
        'role',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}