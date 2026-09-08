<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'logo_text',
        'email',
        'whatsapp',
        'location',
        'github_url',
        'linkedin_url',
        'instagram_url',
        'cv_url',
        'profile_image',
        'seo_title',
        'seo_description',
        'footer_description',
        'copyright_text',
    ];
}