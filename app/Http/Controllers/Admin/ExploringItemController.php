<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExploringItem;
use Illuminate\Http\Request;

class ExploringItemController extends Controller
{
    public function index()
    {
        $items = ExploringItem::query()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view(
            'admin.exploring.index',
            compact('items')
        );
    }

    public function create()
    {
        return view('admin.exploring.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:100'],
            'label' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        ExploringItem::create($validated);

        return redirect()
            ->route('admin.exploring.index')
            ->with('success', 'Exploring item created successfully.');
    }

    public function edit(ExploringItem $exploring)
    {
        return view(
            'admin.exploring.edit',
            compact('exploring')
        );
    }

    public function update(
        Request $request,
        ExploringItem $exploring
    ) {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'icon' => ['nullable', 'string', 'max:100'],
            'label' => ['nullable', 'string', 'max:100'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $exploring->update($validated);

        return redirect()
            ->route('admin.exploring.index')
            ->with('success', 'Exploring item updated successfully.');
    }

    public function destroy(ExploringItem $exploring)
    {
        $exploring->delete();

        return redirect()
            ->route('admin.exploring.index')
            ->with('success', 'Exploring item deleted successfully.');
    }
}