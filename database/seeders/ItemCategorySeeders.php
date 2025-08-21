<?php

namespace Database\Seeders;

use App\Models\ItemCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemCategorySeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Obat',          'code' => 001, 'type_id' => 1],
            ['name' => 'Vaksin',        'code' => 002, 'type_id' => 1],
            ['name' => 'BHP',           'code' => 003, 'type_id' => 2],
            ['name' => 'Alat Kesehatan','code' => 004, 'type_id' => 2],
            ['name' => 'Umum',          'code' => 005, 'type_id' => 3],
            ['name' => 'Gizi',          'code' => 006, 'type_id' => 3],
        ];

        foreach ($categories as $category) {
            ItemCategory::create($category);
        }

    }
}
