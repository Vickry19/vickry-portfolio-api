<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('site_settings', function (Blueprint $table) {
        $table->id();

        // General
        $table->string('site_name')->nullable();
        $table->string('logo_text')->nullable();

        // Contact
        $table->string('email')->nullable();
        $table->string('whatsapp')->nullable();
        $table->string('location')->nullable();

        // Social Media
        $table->string('github_url')->nullable();
        $table->string('linkedin_url')->nullable();
        $table->string('instagram_url')->nullable();

        // CV & Profile
        $table->string('cv_url')->nullable();
        $table->string('profile_image')->nullable();

        // SEO
        $table->string('seo_title')->nullable();
        $table->text('seo_description')->nullable();

        // Footer
        $table->text('footer_description')->nullable();
        $table->string('copyright_text')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
