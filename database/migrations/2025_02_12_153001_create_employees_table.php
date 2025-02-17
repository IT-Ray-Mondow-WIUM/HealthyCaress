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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();

            $table->string('nip')->nullable();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('agama')->nullable();
            $table->string('nik')->nullable();
            $table->foreignId('position_id')->constrained('position');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
