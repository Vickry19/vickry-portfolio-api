<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactMessageMail;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'subject' => [
                'nullable',
                'string',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
            'is_read' => false,
        ]);

        $settings = SiteSetting::first();

        $recipientEmail = $settings?->email
            ?: config('mail.from.address');

        if ($recipientEmail) {
            Mail::to($recipientEmail)
                ->send(
                    new ContactMessageMail($contactMessage)
                );
        }

        return response()->json([
            'message' => 'Your message has been sent successfully.',
            'data' => [
                'id' => $contactMessage->id,
            ],
        ], 201);
    }
}