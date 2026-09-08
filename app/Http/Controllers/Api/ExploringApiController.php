<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ExploringItem;

class ExploringApiController extends Controller
{
    public function index()
    {
        $items = ExploringItem::query()
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'data' => $items->map(function ($item) {
                return [
                    'id' => $item->id,
                    'title' => $item->title,
                    'description' => $item->description,
                    'icon' => $item->icon,
                    'label' => $item->label,
                ];
            })->values(),
        ]);
    }
}