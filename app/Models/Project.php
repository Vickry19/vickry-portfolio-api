<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'number',
        'title',
        'category',
        'year',
        'description',
        'long_description',
        'problem',
        'solution',
        'role',
        'status',
        'technologies',
        'features',
        'github_url',
        'live_url',
        'cover_image',
        'sort_order',
        'is_visible',
        'is_featured',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProjectImage::class)
            ->orderBy('sort_order');
    }
}