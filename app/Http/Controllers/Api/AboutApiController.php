<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutStatistic;

class AboutApiController extends Controller
{
    public function index()
    {
        $about = About::first();

        $statistics = AboutStatistic::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'data' => [
                'descriptionId' => $about?->description_id,
                'descriptionEn' => $about?->description_en,

                'statistics' => $statistics->map(function ($statistic) {
                    return [
                        'id' => $statistic->id,
                        'value' => $statistic->value,
                        'label' => $statistic->label,
                        'suffix' => $statistic->suffix,
                    ];
                })->values(),
            ],
        ]);
    }
}