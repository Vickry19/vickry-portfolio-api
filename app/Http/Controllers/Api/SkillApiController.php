<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;

class SkillApiController extends Controller
{
    public function index()
    {
        $categories = SkillCategory::query()
            ->where('is_visible', true)
            ->with([
                'skills' => function ($query) {
                    $query
                        ->where('is_visible', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                },
            ])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'data' => $categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,

                    'skills' => $category->skills
                        ->map(function ($skill) {
                            return [
                                'id' => $skill->id,
                                'name' => $skill->name,
                                'icon' => $skill->icon,
                            ];
                        })
                        ->values(),
                ];
            })->values(),
        ]);
    }
}