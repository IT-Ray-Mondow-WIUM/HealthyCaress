<?php

namespace Database\Seeders;

use App\Models\ItemType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemTypeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = [
            ['name' => 'Farmasi', 'code' => 001],
            ['name' => 'Medis Non-Obat', 'code' => 002],
            ['name' => 'Non-Medis', 'code' => 003]
        ];

        foreach ($type as $item) {
            ItemType::create($item);
        }
    }
}
