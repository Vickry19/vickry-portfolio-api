<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;

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
            'hello_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'name' => [
                'nullable',
                'string',
                'max:255',
            ],

            'role' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'availability_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'primary_button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'primary_button_url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'secondary_button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'secondary_button_url' => [
                'nullable',
                'string',
                'max:500',
            ],

            'based_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'scroll_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            /*
            |--------------------------------------------------------------------------
            | Vercel Blob URLs
            |--------------------------------------------------------------------------
            */

            'profile_image' => [
                'nullable',
                'url',
                'max:2048',
            ],

            'cv_url' => [
                'nullable',
                'url',
                'max:2048',
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
        |
        | URL berasal dari Vercel Blob.
        |
        */

        if ($request->filled('profile_image')) {
            $validated['profile_image'] =
                $request->input('profile_image');
        } else {
            unset($validated['profile_image']);
        }

        /*
        |--------------------------------------------------------------------------
        | CV
        |--------------------------------------------------------------------------
        |
        | URL berasal dari Vercel Blob.
        |
        */

        if ($request->filled('cv_url')) {
            $validated['cv_url'] =
                $request->input('cv_url');
        } else {
            unset($validated['cv_url']);
        }

        $hero->update($validated);

        return redirect()
            ->route('admin.hero.edit')
            ->with(
                'success',
                'Hero berhasil diperbarui.'
            );
    }
}