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
        Schema::create('patient_diagnosis', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('pasien_id')->constrained('pasien');
            $table->foreignId('icd_x_id')->constrained('icd_x');
            $table->foreignId('pegawai_id')->comment('position id')->constrained('employee');
            $table->string('jenis_kasus');
            $table->foreignId('user_id')->constrained('users');
            $table->string('uuid_satu_sehat')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_diagnosis');
    }
};
