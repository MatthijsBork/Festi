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
        Schema::create('festival_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('festival_id')->constrained('festivals')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival_images');
    }
};
