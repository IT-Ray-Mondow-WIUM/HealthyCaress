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
        Schema::create('icd_x', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('no_dtd')->nullable();
            $table->string('kode')->nullable();
            $table->string('nama');
            $table->smallInteger('menular');
            $table->string('alias')->nullable();
            $table->string('estimasi_expired')->nullable();
            $table->smallInteger('status')->default(1);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icd_x');
    }
};
