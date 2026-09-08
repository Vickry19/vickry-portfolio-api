<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_settings', function (Blueprint $table) {
            $table->id();

            $table->text('description')->nullable();

            $table->string('email_label')->nullable();
            $table->string('whatsapp_label')->nullable();
            $table->string('whatsapp_text')->nullable();
            $table->string('location_label')->nullable();
            $table->string('availability_text')->nullable();

            $table->string('name_label')->nullable();
            $table->string('email_field_label')->nullable();
            $table->string('subject_label')->nullable();
            $table->string('message_label')->nullable();

            $table->string('name_placeholder')->nullable();
            $table->string('email_placeholder')->nullable();
            $table->string('subject_placeholder')->nullable();
            $table->string('message_placeholder')->nullable();

            $table->string('button_text')->nullable();
            $table->string('sending_text')->nullable();
            $table->string('success_message')->nullable();
            $table->string('error_message')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};