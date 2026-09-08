<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Experience;

class ExperienceApiController extends Controller
{
    public function index()
    {
        $experiences = Experience::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'data' => $experiences->map(function ($experience) {
                return [
                    'id' => $experience->id,
                    'period' => $experience->period,
                    'position' => $experience->position,
                    'organization' => $experience->organization,
                    'description' => $experience->description,
                    'technologies' => $experience->technologies,
                ];
            })->values(),
        ]);
    }
}