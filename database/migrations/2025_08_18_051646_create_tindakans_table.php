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
        Schema::create('tindakan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pendaftaran_id')->nullable()->constrained('registrations');
            $table->foreignId('pasien_id')->nullable()->constrained('pasien');
            $table->foreignId('operator_id')->nullable()->constrained('employee');
            $table->foreignId('instalasi_id')->nullable()->constrained('clinics');
            $table->foreignId('tindakan_id')->nullable()->constrained('medical_treatments');
            $table->integer('jumlah');
            $table->foreignId('user_id')->constrained();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tindakan');
    }
};
