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
    Schema::create('heroes', function (Blueprint $table) {
        $table->id();

        $table->string('hello_text')->nullable();
        $table->string('name')->nullable();
        $table->string('role')->nullable();
        $table->text('description')->nullable();

        $table->string('availability_text')->nullable();

        $table->string('primary_button_text')->nullable();
        $table->string('primary_button_url')->nullable();

        $table->string('secondary_button_text')->nullable();
        $table->string('secondary_button_url')->nullable();

        $table->string('based_text')->nullable();
        $table->string('scroll_text')->nullable();

        $table->string('profile_image')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
