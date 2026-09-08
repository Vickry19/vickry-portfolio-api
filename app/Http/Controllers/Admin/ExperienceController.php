<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('sort_order')->get();

        return view(
            'admin.experiences.index',
            compact('experiences')
        );
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'period' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:255'],
            'organization' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'technologies' => ['nullable', 'string', 'max:1000'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        Experience::create($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Experience berhasil ditambahkan.');
    }

    public function edit(Experience $experience)
    {
        return view(
            'admin.experiences.edit',
            compact('experience')
        );
    }

    public function update(
        Request $request,
        Experience $experience
    ) {
        $validated = $request->validate([
            'period' => ['required', 'string', 'max:100'],
            'position' => ['required', 'string', 'max:255'],
            'organization' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'technologies' => ['nullable', 'string', 'max:1000'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $experience->update($validated);

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Experience berhasil diperbarui.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()
            ->route('admin.experiences.index')
            ->with('success', 'Experience berhasil dihapus.');
    }
}