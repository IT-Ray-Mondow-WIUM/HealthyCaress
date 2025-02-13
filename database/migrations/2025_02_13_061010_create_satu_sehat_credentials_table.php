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
        Schema::create('satu_sehat_credentials', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('organization_id'); // Organization ID
            $table->string('client_key'); // Client Key
            $table->string('secret_key'); // Secret Key
            $table->text('access_token')->nullable(); // Access Token
            $table->dateTime('token_expiration')->nullable(); // Token expiration date
            $table->timestamps(); // Menyimpan created_at dan updated_at
            $table->softDeletes(); // Menyimpan waktu penghapusan soft delete
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satu_sehat_credentials');
    }
};
