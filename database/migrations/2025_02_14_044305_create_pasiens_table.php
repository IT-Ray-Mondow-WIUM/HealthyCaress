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
            $table->string('tempat_lahir')->nullable();
            $table->string('status_pernikahan')->default('belum menikah');

            // Kependudukan
            $table->integer('province_kode');
            $table->integer('city_kode');
            $table->bigInteger('district_kode');
            $table->bigInteger('village_kode');
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
            $table->string('no_kartu')->nullable();
            $table->foreignId('user_id')->constrained('users');

            //id
            $table->string('no_rm')->nullable();
            $table->string('no_pasien_lama')->nullable();
            $table->string('ihs')->nullable();
            $table->string('images')->nullable();

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
