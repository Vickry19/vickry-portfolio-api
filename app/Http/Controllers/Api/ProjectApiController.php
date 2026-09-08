<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\JsonResponse;

class ProjectApiController extends Controller
{
    /**
     * Get all visible projects.
     */
    public function index(): JsonResponse
    {
        $projects = Project::with([
            'images' => function ($query) {
                $query
                    ->where('is_visible', true)
                    ->orderBy('sort_order');
            },
        ])
            ->where('is_visible', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $projects->map(
                fn (Project $project) => $this->transformProject($project)
            ),
        ]);
    }

    /**
     * Get single visible project by slug.
     */
    public function show(string $slug): JsonResponse
    {
        $project = Project::with([
            'images' => function ($query) {
                $query
                    ->where('is_visible', true)
                    ->orderBy('sort_order');
            },
        ])
            ->where('slug', $slug)
            ->where('is_visible', true)
            ->first();

        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => 'Project tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $this->transformProject($project),
        ]);
    }

    /**
     * Transform project data for frontend.
     */
    private function transformProject(Project $project): array
    {
        return [
            'slug' => $project->slug,
            'number' => $project->number,
            'title' => $project->title,
            'category' => $project->category,
            'year' => $project->year,

            'description' => $project->description,
            'longDescription' => $project->long_description,

            'problem' => $project->problem,
            'solution' => $project->solution,

            'role' => $project->role,
            'status' => $project->status,

            'technologies' => $this->toArray(
                $project->technologies
            ),

            'features' => $this->toArray(
                $project->features
            ),

            'githubUrl' => $project->github_url,
            'liveUrl' => $project->live_url,

            'coverImage' => $this->imageUrl(
                $project->cover_image
            ),

            'images' => $project->images
                ->map(
                    fn ($image) => $this->imageUrl($image->image)
                )
                ->values()
                ->all(),
        ];
    }

    /**
     * Convert multiline text to array.
     */
    private function toArray(?string $value): array
    {
        if (!$value) {
            return [];
        }

        return array_values(
            array_filter(
                array_map(
                    'trim',
                    preg_split('/\r\n|\r|\n/', $value)
                )
            )
        );
    }

    /**
     * Generate public storage URL.
     */
    private function imageUrl(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        return asset('storage/' . $path);
    }
}