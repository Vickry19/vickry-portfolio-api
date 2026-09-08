<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = [
        'hello_text',
        'name',
        'role',
        'description',
        'availability_text',
        'based_text',
        'scroll_text',
        'profile_image',
        'cv_url',
    ];
}