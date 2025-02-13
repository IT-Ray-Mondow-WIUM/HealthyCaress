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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('kode')->unique();
            $table->integer('province_kode')->constrained('provinces'); // Mengacu pada kode di tabel provinsi
            $table->timestamps();
            $table->softDeletes(); // Menambahkan kolom soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
