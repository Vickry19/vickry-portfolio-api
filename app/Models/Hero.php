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

        'primary_button_text',
        'primary_button_url',

        'secondary_button_text',
        'secondary_button_url',

        'based_text',
        'scroll_text',

        'profile_image',
        'cv_url',
    ];
}