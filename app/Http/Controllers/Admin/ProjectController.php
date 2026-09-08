<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar project.
     */
    public function index()
    {
        $projects = Project::withCount('images')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Menampilkan form tambah project.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Menyimpan project baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => ['nullable', 'string', 'max:10'],
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:projects,slug'],
            'category' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:50'],

            'description' => ['nullable', 'string'],
            'long_description' => ['nullable', 'string'],
            'problem' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],

            'role' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],

            'technologies' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],

            'github_url' => ['nullable', 'url', 'max:255'],
            'live_url' => ['nullable', 'url', 'max:255'],

            'cover_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Generate slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $validated['slug']
            ?? Str::slug($validated['title']);

        /*
        |--------------------------------------------------------------------------
        | Convert technologies & features
        |--------------------------------------------------------------------------
        |
        | Data disimpan sebagai text dengan satu item per baris.
        |
        */

        $validated['technologies'] = $this->normalizeLines(
            $validated['technologies'] ?? null
        );

        $validated['features'] = $this->normalizeLines(
            $validated['features'] ?? null
        );

        /*
        |--------------------------------------------------------------------------
        | Visibility & Featured
        |--------------------------------------------------------------------------
        */

        $validated['is_visible'] = $request->boolean('is_visible');
        $validated['is_featured'] = $request->boolean('is_featured');

        /*
        |--------------------------------------------------------------------------
        | Only One Featured Project
        |--------------------------------------------------------------------------
        |
        | Jika project baru dijadikan Featured,
        | project Featured sebelumnya akan dinonaktifkan.
        |
        */

        if ($validated['is_featured']) {
            Project::where('is_featured', true)
                ->update(['is_featured' => false]);
        }

        /*
        |--------------------------------------------------------------------------
        | Upload Cover
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cover_image')) {
            $validated['cover_image'] = $request
                ->file('cover_image')
                ->store('images/projects', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Create Project
        |--------------------------------------------------------------------------
        */

        $project = Project::create($validated);

        /*
        |--------------------------------------------------------------------------
        | Upload Gallery
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $index => $image) {
                if (!$image->isValid()) {
                    continue;
                }

                $path = $image->store(
                    'images/projects/' . $project->slug,
                    'public'
                );

                $project->images()->create([
                    'image' => $path,
                    'alt' => $project->title,
                    'sort_order' => $index + 1,
                    'is_visible' => true,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit project.
     */
    public function edit(Project $project)
    {
        $project->load([
            'images' => function ($query) {
                $query->orderBy('sort_order');
            },
        ]);

        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update project.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'number' => ['nullable', 'string', 'max:10'],
            'title' => ['required', 'string', 'max:255'],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:projects,slug,' . $project->id,
            ],

            'category' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:50'],

            'description' => ['nullable', 'string'],
            'long_description' => ['nullable', 'string'],
            'problem' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],

            'role' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', 'string', 'max:255'],

            'technologies' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],

            'github_url' => ['nullable', 'url', 'max:255'],
            'live_url' => ['nullable', 'url', 'max:255'],

            'cover_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'gallery.*' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
            'is_featured' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Slug
        |--------------------------------------------------------------------------
        */

        $validated['slug'] = $validated['slug']
            ?? Str::slug($validated['title']);

        /*
        |--------------------------------------------------------------------------
        | Technologies & Features
        |--------------------------------------------------------------------------
        */

        $validated['technologies'] = $this->normalizeLines(
            $validated['technologies'] ?? null
        );

        $validated['features'] = $this->normalizeLines(
            $validated['features'] ?? null
        );

        /*
        |--------------------------------------------------------------------------
        | Visibility & Featured
        |--------------------------------------------------------------------------
        */

        $validated['is_visible'] = $request->boolean('is_visible');
        $validated['is_featured'] = $request->boolean('is_featured');

        /*
        |--------------------------------------------------------------------------
        | Only One Featured Project
        |--------------------------------------------------------------------------
        |
        | Jika project ini dijadikan Featured,
        | project lain akan otomatis menjadi non-featured.
        |
        */

        if ($validated['is_featured']) {
            Project::where('id', '!=', $project->id)
                ->where('is_featured', true)
                ->update(['is_featured' => false]);
        }

        /*
        |--------------------------------------------------------------------------
        | Cover Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::disk('public')->delete(
                    $project->cover_image
                );
            }

            $validated['cover_image'] = $request
                ->file('cover_image')
                ->store('images/projects', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Update Project
        |--------------------------------------------------------------------------
        */

        $project->update($validated);

        /*
        |--------------------------------------------------------------------------
        | Add Gallery Images
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('gallery')) {
            $lastSortOrder = $project->images()->max('sort_order') ?? 0;

            foreach ($request->file('gallery') as $index => $image) {
                if (!$image->isValid()) {
                    continue;
                }

                $path = $image->store(
                    'images/projects/' . $project->slug,
                    'public'
                );

                $project->images()->create([
                    'image' => $path,
                    'alt' => $project->title,
                    'sort_order' => $lastSortOrder + $index + 1,
                    'is_visible' => true,
                ]);
            }
        }

        return redirect()
            ->route('admin.projects.edit', $project)
            ->with('success', 'Project berhasil diperbarui.');
    }

    /**
     * Delete project.
     */
    public function destroy(Project $project)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Cover
        |--------------------------------------------------------------------------
        */

        if ($project->cover_image) {
            Storage::disk('public')->delete(
                $project->cover_image
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Gallery Images
        |--------------------------------------------------------------------------
        */

        foreach ($project->images as $image) {
            if ($image->image) {
                Storage::disk('public')->delete(
                    $image->image
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Project
        |--------------------------------------------------------------------------
        */

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    /**
     * Convert textarea lines into clean string.
     */
    private function normalizeLines(?string $value): ?string
    {
        if (!$value) {
            return null;
        }

        $lines = preg_split('/\r\n|\r|\n/', $value);

        $lines = array_filter(
            array_map('trim', $lines)
        );

        return empty($lines)
            ? null
            : implode("\n", $lines);
    }
}