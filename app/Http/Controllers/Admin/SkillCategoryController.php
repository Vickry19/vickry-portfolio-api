<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillCategoryController extends Controller
{
    public function index()
    {
        $categories = SkillCategory::withCount('skills')
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.skill-categories.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view('admin.skill-categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        SkillCategory::create($validated);

        return redirect()
            ->route('admin.skill-categories.index')
            ->with('success', 'Skill category berhasil ditambahkan.');
    }

    public function edit(SkillCategory $skillCategory)
    {
        return view(
            'admin.skill-categories.edit',
            compact('skillCategory')
        );
    }

    public function update(
        Request $request,
        SkillCategory $skillCategory
    ) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $skillCategory->update($validated);

        return redirect()
            ->route('admin.skill-categories.index')
            ->with('success', 'Skill category berhasil diperbarui.');
    }

    public function destroy(SkillCategory $skillCategory)
    {
        $skillCategory->delete();

        return redirect()
            ->route('admin.skill-categories.index')
            ->with('success', 'Skill category berhasil dihapus.');
    }
}