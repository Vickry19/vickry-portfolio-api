<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = Hero::first();

        if (!$hero) {
            $hero = Hero::create([]);
        }

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'hello_text' => ['nullable', 'string', 'max:255'],
            'name' => ['nullable', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],

            'availability_text' => ['nullable', 'string', 'max:255'],

            'primary_button_text' => ['nullable', 'string', 'max:255'],
            'primary_button_url' => ['nullable', 'string', 'max:500'],

            'secondary_button_text' => ['nullable', 'string', 'max:255'],
            'secondary_button_url' => ['nullable', 'string', 'max:500'],

            'based_text' => ['nullable', 'string', 'max:255'],
            'scroll_text' => ['nullable', 'string', 'max:255'],

            'profile_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'cv_file' => [
                'nullable',
                'file',
                'mimes:pdf',
                'max:10240',
            ],
        ]);

        $hero = Hero::first();

        if (!$hero) {
            $hero = Hero::create([]);
        }

        /*
        |--------------------------------------------------------------------------
        | Profile Image
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_image')) {

            // Hapus gambar lama
            if ($hero->profile_image) {
                Storage::disk('public')->delete($hero->profile_image);
            }

            // Simpan gambar baru
            $validated['profile_image'] = $request
                ->file('profile_image')
                ->store('images/profile', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | CV
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cv_file')) {

            // Hapus CV lama
            if ($hero->cv_url) {
                Storage::disk('public')->delete($hero->cv_url);
            }

            // Simpan CV baru
            $validated['cv_url'] = $request
                ->file('cv_file')
                ->store('cv', 'public');
        }

        // Jangan kirim cv_file ke database
        unset($validated['cv_file']);

        $hero->update($validated);

        return redirect()
            ->route('admin.hero.edit')
            ->with('success', 'Hero berhasil diperbarui.');
    }
}