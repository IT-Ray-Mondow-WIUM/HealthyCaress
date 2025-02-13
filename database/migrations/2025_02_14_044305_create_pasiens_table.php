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
        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            // Biodata
            $table->string('nama');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->date('tanggal_lahir')->nullable();
            $table->date('tempat_lahir')->nullable();
            $table->string('status_pernikahan')->default('belum menikah');

            // Kependudukan
            $table->foreignId('province_kode')->nullable()->constrained('provinces');
            $table->foreignId('city_kode')->nullable()->constrained('cities');
            $table->foreignId('district_kode')->nullable()->constrained('districts');
            $table->foreignId('village_kode')->nullable()->constrained('villages');
            $table->text('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->foreignId('agama_id')->nullable()->constrained('religions');
            $table->foreignId('pekerjaan_id')->nullable()->constrained('works');
            $table->string('jenis_identitas')->nullable();
            $table->string('no_identitas')->nullable();
            $table->enum('kewarganegaraan', ['wni', 'wna'])->default('wni');

            // adminsitratif
            $table->string('jenis_pasien')->default('umum');
            $table->string('nama_penanggung')->nullable();
            $table->foreignId('hubungan_keluarga_id')->nullable()->constrained('family_relations');
            $table->string('telepon_penanggung')->nullable();

            //kontak
            $table->string('telepon_rumah')->nullable();
            $table->string('telepon_mobile')->nullable();
            $table->string('email')->nullable();

            //foto
            $table->string('foto')->nullable();
            $table->foreignId('user_id')->constrained();

            //id
            $table->string('no_rm')->nullable();
            $table->string('no_pasien_lama')->nullable();
            $table->string('ihs')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
