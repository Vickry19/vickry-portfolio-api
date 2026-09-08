<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::first();

        if (!$about) {
            $about = About::create([]);
        }

        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'description_id' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
        ]);

        $about = About::first();

        if (!$about) {
            $about = About::create($validated);
        } else {
            $about->update($validated);
        }

        return redirect()
            ->route('admin.about.edit')
            ->with('success', 'About berhasil diperbarui.');
    }
}