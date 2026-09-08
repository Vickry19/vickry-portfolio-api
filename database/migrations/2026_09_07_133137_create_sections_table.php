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
    Schema::create('sections', function (Blueprint $table) {
        $table->id();

        $table->string('key')->unique();
        $table->string('number')->nullable();
        $table->string('eyebrow')->nullable();
        $table->string('title')->nullable();
        $table->text('subtitle')->nullable();

        $table->boolean('is_visible')->default(true);
        $table->unsignedInteger('sort_order')->default(0);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections');
    }
};
