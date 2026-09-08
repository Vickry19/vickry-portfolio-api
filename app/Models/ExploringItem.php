<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExploringItem extends Model
{
    protected $table = 'exploring_items';

    protected $fillable = [
        'title',
        'description',
        'icon',
        'label',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}