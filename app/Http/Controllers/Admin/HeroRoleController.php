<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroRole;
use Illuminate\Http\Request;

class HeroRoleController extends Controller
{
    public function index()
    {
        $roles = HeroRole::orderBy('sort_order')->get();

        return view('admin.hero-roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.hero-roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        HeroRole::create($validated);

        return redirect()
            ->route('admin.hero-roles.index')
            ->with('success', 'Role berhasil ditambahkan.');
    }

    public function edit(HeroRole $heroRole)
    {
        return view('admin.hero-roles.edit', compact('heroRole'));
    }

    public function update(Request $request, HeroRole $heroRole)
    {
        $validated = $request->validate([
            'role' => ['required', 'string', 'max:255'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'is_visible' => ['nullable', 'boolean'],
        ]);

        $validated['is_visible'] = $request->boolean('is_visible');

        $heroRole->update($validated);

        return redirect()
            ->route('admin.hero-roles.index')
            ->with('success', 'Role berhasil diperbarui.');
    }

    public function destroy(HeroRole $heroRole)
    {
        $heroRole->delete();

        return redirect()
            ->route('admin.hero-roles.index')
            ->with('success', 'Role berhasil dihapus.');
    }
}