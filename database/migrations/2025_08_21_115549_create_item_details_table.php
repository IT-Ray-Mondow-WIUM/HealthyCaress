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
        Schema::create('item_details', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama barang
            $table->foreignId('category_id')->constrained('item_categories'); // kategori barang
            $table->foreignId('vendor_id')->nullable()->constrained('vendors'); // pemasok
            $table->foreignId('unit_id')->nullable()->constrained('item_units'); // satuan (pcs, box, tablet, dll)
            $table->integer('first_stock')->default(0); // jumlah stok
            $table->integer('minimum_stock')->nullable(); // batas minimum stok
            $table->decimal('net_price', 15, 2)->nullable(); // harga dasar/netto
            $table->decimal('cost_price', 15, 2)->nullable(); // harga pokok pembelian
            $table->smallInteger('active_status')->default(1); // aktif/tidak
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_details');
    }
};
