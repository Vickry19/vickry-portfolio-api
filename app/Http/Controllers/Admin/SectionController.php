<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::orderBy('sort_order')->get();

        return view('admin.sections.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => ['required', 'string', 'max:100', 'unique:sections,key'],
            'number' => ['nullable', 'string', 'max:20'],
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        Section::create($validated);

        return redirect()
            ->route('admin.sections.index')
            ->with('success', 'Section berhasil ditambahkan.');
    }

    public function edit(Section $section)
    {
        return view('admin.sections.edit', compact('section'));
    }

    public function update(Request $request, Section $section)
    {
        $validated = $request->validate([
            'key' => [
                'required',
                'string',
                'max:100',
                'unique:sections,key,' . $section->id,
            ],
            'number' => ['nullable', 'string', 'max:20'],
            'eyebrow' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $section->update($validated);

        return redirect()
            ->route('admin.sections.index')
            ->with('success', 'Section berhasil diperbarui.');
    }

    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()
            ->route('admin.sections.index')
            ->with('success', 'Section berhasil dihapus.');
    }
}