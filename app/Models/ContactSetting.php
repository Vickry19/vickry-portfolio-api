<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $table = 'contact_settings';

    protected $fillable = [
        'description',

        'email_label',
        'whatsapp_label',
        'whatsapp_text',
        'location_label',
        'availability_text',

        'name_label',
        'email_field_label',
        'subject_label',
        'message_label',

        'name_placeholder',
        'email_placeholder',
        'subject_placeholder',
        'message_placeholder',

        'button_text',
        'sending_text',
        'send_text',
        'success_message',
        'error_message',
    ];
}