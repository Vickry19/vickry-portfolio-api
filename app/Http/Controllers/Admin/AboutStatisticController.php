<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutStatistic;
use Illuminate\Http\Request;

class AboutStatisticController extends Controller
{
    public function index()
    {
        $statistics = AboutStatistic::orderBy('sort_order')->get();

        return view('admin.about-statistics.index', compact('statistics'));
    }

    public function create()
    {
        return view('admin.about-statistics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'value' => ['required', 'string', 'max:50'],
            'label' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:20'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        AboutStatistic::create($validated);

        return redirect()
            ->route('admin.about-statistics.index')
            ->with('success', 'Statistic berhasil ditambahkan.');
    }

    public function edit(AboutStatistic $aboutStatistic)
    {
        return view(
            'admin.about-statistics.edit',
            compact('aboutStatistic')
        );
    }

    public function update(
        Request $request,
        AboutStatistic $aboutStatistic
    ) {
        $validated = $request->validate([
            'value' => ['required', 'string', 'max:50'],
            'label' => ['required', 'string', 'max:255'],
            'suffix' => ['nullable', 'string', 'max:20'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $aboutStatistic->update($validated);

        return redirect()
            ->route('admin.about-statistics.index')
            ->with('success', 'Statistic berhasil diperbarui.');
    }

    public function destroy(AboutStatistic $aboutStatistic)
    {
        $aboutStatistic->delete();

        return redirect()
            ->route('admin.about-statistics.index')
            ->with('success', 'Statistic berhasil dihapus.');
    }
}