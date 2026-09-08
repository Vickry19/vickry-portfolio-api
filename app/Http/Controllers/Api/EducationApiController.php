<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Education;

class EducationApiController extends Controller
{
    public function index()
    {
        $educations = Education::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'data' => $educations->map(function ($education) {
                return [
                    'id' => $education->id,
                    'period' => $education->period,
                    'degree' => $education->degree,
                    'institution' => $education->institution,
                    'description' => $education->description,
                    'focus' => $education->focus,
                ];
            })->values(),
        ]);
    }
}