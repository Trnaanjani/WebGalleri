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
        Schema::create('foto', function (Blueprint $table) {
            $table->id(); // Kolom id (integer, auto-increment)
            $table->integer('galery_id'); // Kolom galery_id (integer)
            $table->string('file'); // Kolom file (varchar)
            $table->string('judul'); // Kolom judul (varchar)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
