<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillCategory;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::with('category')
            ->orderBy('skill_category_id')
            ->orderBy('sort_order')
            ->get();

        return view(
            'admin.skills.index',
            compact('skills')
        );
    }

    public function create()
    {
        $categories = SkillCategory::orderBy('sort_order')->get();

        return view(
            'admin.skills.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'skill_category_id' => [
                'required',
                'exists:skill_categories,id',
            ],
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        Skill::create($validated);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill berhasil ditambahkan.');
    }

    public function edit(Skill $skill)
    {
        $categories = SkillCategory::orderBy('sort_order')->get();

        return view(
            'admin.skills.edit',
            compact('skill', 'categories')
        );
    }

    public function update(
        Request $request,
        Skill $skill
    ) {
        $validated = $request->validate([
            'skill_category_id' => [
                'required',
                'exists:skill_categories,id',
            ],
            'name' => ['required', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $skill->update($validated);

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus.');
    }
}