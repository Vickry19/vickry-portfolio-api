<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\HeroRole;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class HeroApiController extends Controller
{
    public function index(): JsonResponse
    {
        $hero = Hero::first();

        if (!$hero) {
            return response()->json([
                'success' => false,
                'message' => 'Hero content belum tersedia.',
            ], 404);
        }

        $roles = HeroRole::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->get();

        return response()->json([
            'success' => true,

            'data' => [
                'helloText' => $hero->hello_text,
                'name' => $hero->name,
                'role' => $hero->role,
                'description' => $hero->description,
                'availabilityText' => $hero->availability_text,

                'primaryButtonText' => $hero->primary_button_text,
                'primaryButtonUrl' => $hero->primary_button_url,

                'secondaryButtonText' => $hero->secondary_button_text,
                'secondaryButtonUrl' => $hero->secondary_button_url,

                'basedText' => $hero->based_text,
                'scrollText' => $hero->scroll_text,

                'profileImage' => $this->assetUrl(
                    $hero->profile_image
                ),

                'cvUrl' => $this->assetUrl(
                    $hero->cv_url
                ),

                'roles' => $roles->map(
                    fn (HeroRole $role) => [
                        'role' => $role->role,
                    ]
                )->values(),
            ],
        ]);
    }

    /**
     * Convert storage path to URL.
     * Keep Vercel Blob URLs unchanged.
     */
    private function assetUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        return asset('storage/' . $path);
    }
}