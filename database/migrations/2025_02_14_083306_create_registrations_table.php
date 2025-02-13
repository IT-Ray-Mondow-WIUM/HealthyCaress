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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('patient_id')->constrained('pasien');
            $table->date('tanggal');
            $table->string('jenis_pendaftaran');
            $table->enum('jenis_pasien', ['lama', 'baru']);
            $table->foreignId('clinic_id')->nullable()->constrained('clinics');
            $table->foreignId('doctor_id')->nullable()->constrained('doctors');
            $table->integer('no_antrian')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->string('uuid_satu_sehat')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
