<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('number', 10)->nullable();

            $table->string('title');
            $table->string('category')->nullable();
            $table->string('year')->nullable();

            $table->text('description')->nullable();
            $table->longText('long_description')->nullable();

            $table->text('problem')->nullable();
            $table->text('solution')->nullable();

            $table->string('role')->nullable();
            $table->string('status')->nullable();

            $table->text('technologies')->nullable();
            $table->longText('features')->nullable();

            $table->string('github_url')->nullable();
            $table->string('live_url')->nullable();

            $table->string('cover_image')->nullable();

            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};