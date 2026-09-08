<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingController extends Controller
{
    public function edit()
    {
        $settings = ContactSetting::first();

        if (!$settings) {
            $settings = ContactSetting::create([
                'description' => 'Have a project, internship opportunity, or just want to connect? Feel free to reach out. I\'m always open to discussing new ideas and opportunities.',

                'email_label' => 'Email',
                'whatsapp_label' => 'WhatsApp',
                'whatsapp_text' => 'Let\'s connect',
                'location_label' => 'Location',
                'availability_text' => 'Currently open to opportunities',

                'name_label' => 'Name',
                'email_field_label' => 'Email',
                'subject_label' => 'Subject',
                'message_label' => 'Message',

                'name_placeholder' => 'Your name',
                'email_placeholder' => 'you@example.com',
                'subject_placeholder' => 'What would you like to discuss?',
                'message_placeholder' => 'Tell me about your project...',

                'button_text' => 'Send Message',
                'sending_text' => 'Sending...',
                'sent_text' => 'Message Sent',
                'success_message' => 'Thanks! Your message has been received successfully. I\'ll get back to you soon.',
                'error_message' => 'Something went wrong. Please try again.',
            ]);
        }

        return view('admin.contact-settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'description' => ['nullable', 'string'],

            'email_label' => ['nullable', 'string', 'max:100'],
            'whatsapp_label' => ['nullable', 'string', 'max:100'],
            'whatsapp_text' => ['nullable', 'string', 'max:100'],
            'location_label' => ['nullable', 'string', 'max:100'],
            'availability_text' => ['nullable', 'string', 'max:255'],

            'name_label' => ['nullable', 'string', 'max:100'],
            'email_field_label' => ['nullable', 'string', 'max:100'],
            'subject_label' => ['nullable', 'string', 'max:100'],
            'message_label' => ['nullable', 'string', 'max:100'],

            'name_placeholder' => ['nullable', 'string', 'max:255'],
            'email_placeholder' => ['nullable', 'string', 'max:255'],
            'subject_placeholder' => ['nullable', 'string', 'max:255'],
            'message_placeholder' => ['nullable', 'string', 'max:255'],

            'button_text' => ['nullable', 'string', 'max:100'],
            'sending_text' => ['nullable', 'string', 'max:100'],
            'sent_text' => ['nullable', 'string', 'max:100'],
            'success_message' => ['nullable', 'string', 'max:255'],
            'error_message' => ['nullable', 'string', 'max:255'],
        ]);

        $settings = ContactSetting::first();

        if (!$settings) {
            $settings = new ContactSetting();
        }

        $settings->fill($validated);
        $settings->save();

        return redirect()
            ->route('admin.contact-settings.edit')
            ->with('success', 'Contact settings berhasil diperbarui.');
    }
}