<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('sort_order')->get();

        return view(
            'admin.educations.index',
            compact('educations')
        );
    }

    public function create()
    {
        return view('admin.educations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'period' => ['required', 'string', 'max:100'],
            'degree' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'focus' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        Education::create($validated);

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Education berhasil ditambahkan.');
    }

    public function edit(Education $education)
    {
        return view(
            'admin.educations.edit',
            compact('education')
        );
    }

    public function update(
        Request $request,
        Education $education
    ) {
        $validated = $request->validate([
            'period' => ['required', 'string', 'max:100'],
            'degree' => ['required', 'string', 'max:255'],
            'institution' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'focus' => ['nullable', 'string', 'max:2000'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $education->update($validated);

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Education berhasil diperbarui.');
    }

    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()
            ->route('admin.educations.index')
            ->with('success', 'Education berhasil dihapus.');
    }
}