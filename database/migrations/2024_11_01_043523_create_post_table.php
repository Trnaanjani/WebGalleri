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
        Schema::create('post', function (Blueprint $table) {
            $table->id(); // Kolom id (integer, auto-increment)
            $table->string('judul'); // Kolom judul (varchar)
            $table->integer('kategori_id'); // Kolom kategori_id (integer)
            $table->text('isi'); // Kolom isi (text)
            $table->integer('user_id'); // Kolom user_id (integer)
            $table->string('status'); // Kolom status (varchar)
            $table->timestamp('created_at')->useCurrent(); // Kolom created_at (timestamp dengan waktu saat ini secara default)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
