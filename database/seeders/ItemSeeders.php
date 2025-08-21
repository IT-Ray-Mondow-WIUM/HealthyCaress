<?php

namespace Database\Seeders;

use App\Models\ItemDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangs = [];

        // 10 Obat
        for ($i = 1; $i <= 10; $i++) {
            $barangs[] = [
                'name' => "Obat $i",
                'category_id' => 1, // kategori Obat
                'vendor_id' => rand(1, 10), // asumsi vendor obat sudah ada
                'unit_id' => rand(1, 5), // misal unit 1-5
                'first_stock' => rand(50, 200),
                'minimum_stock' => rand(5, 20),
                'net_price' => rand(5000, 20000),
                'cost_price' => rand(3000, 15000),
                'active_status' => 1,
            ];
        }

        // 5 Vaksin
        for ($i = 1; $i <= 5; $i++) {
            $barangs[] = [
                'name' => "Vaksin $i",
                'category_id' => 2,
                'vendor_id' => rand(11, 15),
                'unit_id' => rand(1, 5),
                'first_stock' => rand(20, 100),
                'minimum_stock' => rand(5, 15),
                'net_price' => rand(20000, 50000),
                'cost_price' => rand(15000, 40000),
                'active_status' => 1,
            ];
        }

        // 10 BHP
        for ($i = 1; $i <= 10; $i++) {
            $barangs[] = [
                'name' => "BHP $i",
                'category_id' => 3,
                'vendor_id' => rand(16, 25),
                'unit_id' => rand(1, 5),
                'first_stock' => rand(30, 150),
                'minimum_stock' => rand(5, 15),
                'net_price' => rand(2000, 10000),
                'cost_price' => rand(1000, 8000),
                'active_status' => 1,
            ];
        }

        // 5 Alat Kesehatan
        for ($i = 1; $i <= 5; $i++) {
            $barangs[] = [
                'name' => "Alat Kesehatan $i",
                'category_id' => 4,
                'vendor_id' => rand(26, 30),
                'unit_id' => rand(1, 5),
                'first_stock' => rand(10, 50),
                'minimum_stock' => rand(2, 10),
                'net_price' => rand(50000, 200000),
                'cost_price' => rand(40000, 150000),
                'active_status' => 1,
            ];
        }

        // 10 Umum
        for ($i = 1; $i <= 10; $i++) {
            $barangs[] = [
                'name' => "Barang Umum $i",
                'category_id' => 5,
                'vendor_id' => rand(31, 40),
                'unit_id' => rand(1, 5),
                'first_stock' => rand(50, 200),
                'minimum_stock' => rand(5, 20),
                'net_price' => rand(5000, 20000),
                'cost_price' => rand(3000, 15000),
                'active_status' => 1,
            ];
        }

        // 10 Gizi
        for ($i = 1; $i <= 10; $i++) {
            $barangs[] = [
                'name' => "Gizi $i",
                'category_id' => 6,
                'vendor_id' => rand(41, 50),
                'unit_id' => rand(1, 5),
                'first_stock' => rand(50, 150),
                'minimum_stock' => rand(5, 20),
                'net_price' => rand(10000, 50000),
                'cost_price' => rand(7000, 40000),
                'active_status' => 1,
            ];
        }

        foreach ($barangs as $item) {
            ItemDetail::create($item);
        }
    }
}
