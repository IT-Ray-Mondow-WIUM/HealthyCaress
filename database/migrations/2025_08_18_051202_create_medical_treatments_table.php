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
        Schema::create('medical_treatments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code')->unique();       // Kode unik treatment
            $table->string('name');                 // Nama treatment
            $table->string('category');             // Kategori treatment
            $table->text('description')->nullable(); // Keterangan tambahan
            $table->decimal('fee', 12, 2);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_treatments');
    }
};
