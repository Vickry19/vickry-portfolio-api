<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function edit()
    {
        $settings = SiteSetting::first();

        if (!$settings) {
            $settings = SiteSetting::create([]);
        }

        return view('admin.site-settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name' => ['nullable', 'string', 'max:255'],
            'logo_text' => ['nullable', 'string', 'max:255'],

            'email' => ['nullable', 'email', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'location' => ['nullable', 'string', 'max:255'],

            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'instagram_url' => ['nullable', 'url', 'max:255'],

            'cv_url' => ['nullable', 'string', 'max:255'],
            'profile_image' => ['nullable', 'string', 'max:255'],

            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],

            'footer_description' => ['nullable', 'string'],
            'copyright_text' => ['nullable', 'string', 'max:255'],
        ]);

        $settings = SiteSetting::first();

        if (!$settings) {
            $settings = SiteSetting::create($validated);
        } else {
            $settings->update($validated);
        }

        return redirect()
            ->route('admin.site-settings.edit')
            ->with('success', 'Site settings berhasil diperbarui.');
    }
}