<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\JsonResponse;

class ContactSettingApiController extends Controller
{
    public function index(): JsonResponse
    {
        $settings = ContactSetting::first();

        if (!$settings) {
            return response()->json([
                'data' => null,
            ]);
        }

        return response()->json([
            'data' => [
                'description' => $settings->description,

                'emailLabel' => $settings->email_label,
                'whatsappLabel' => $settings->whatsapp_label,
                'whatsappText' => $settings->whatsapp_text,
                'locationLabel' => $settings->location_label,
                'availabilityText' => $settings->availability_text,

                'nameLabel' => $settings->name_label,
                'emailFieldLabel' => $settings->email_field_label,
                'subjectLabel' => $settings->subject_label,
                'messageLabel' => $settings->message_label,

                'namePlaceholder' => $settings->name_placeholder,
                'emailPlaceholder' => $settings->email_placeholder,
                'subjectPlaceholder' => $settings->subject_placeholder,
                'messagePlaceholder' => $settings->message_placeholder,

                'buttonText' => $settings->button_text,
'sendingText' => $settings->sending_text,
'sentText' => $settings->sent_text,
'successMessage' => $settings->success_message,
            ],
        ]);
    }
}