<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Models\SiteSetting;
use Illuminate\Http\JsonResponse;

class SiteContentApiController extends Controller
{
    /**
     * Get global site content.
     */
    public function index(): JsonResponse
    {
        $settings = SiteSetting::first();

        $sections = Section::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,

            'data' => [
                'settings' => $settings ? [
                    'siteName' => $settings->site_name,
                    'logoText' => $settings->logo_text,

                    'email' => $settings->email,
                    'whatsapp' => $settings->whatsapp,
                    'location' => $settings->location,

                    'githubUrl' => $settings->github_url,
                    'linkedinUrl' => $settings->linkedin_url,
                    'instagramUrl' => $settings->instagram_url,

                    'cvUrl' => $this->assetUrl($settings->cv_url),
                    'profileImage' => $this->assetUrl($settings->profile_image),

                    'seoTitle' => $settings->seo_title,
                    'seoDescription' => $settings->seo_description,

                    'footerDescription' => $settings->footer_description,
                    'copyrightText' => $settings->copyright_text,
                ] : null,

                'sections' => $sections->map(
                    fn (Section $section) => [
                        'key' => $section->key,
                        'number' => $section->number,
                        'eyebrow' => $section->eyebrow,
                        'title' => $section->title,
                        'subtitle' => $section->subtitle,
                    ]
                )->values(),
            ],
        ]);
    }

    private function assetUrl(?string $path): ?string
{
    if (!$path) {
        return null;
    }

    return asset('storage/' . $path);
}
}