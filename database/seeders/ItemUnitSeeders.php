<?php

namespace Database\Seeders;

use App\Models\ItemUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemUnitSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $satuan = [
            ['nama' => 'Tablet'],
            ['nama' => 'Kaplet'],
            ['nama' => 'Kapsul'],
            ['nama' => 'Botol'],
            ['nama' => 'Vial'],
            ['nama' => 'Ampul'],
            ['nama' => 'Tube'],
            ['nama' => 'Box'],
            ['nama' => 'Strip'],
            ['nama' => 'Sachet'],
            ['nama' => 'Pack'],
            ['nama' => 'Pcs'],
            ['nama' => 'Pot'],
            ['nama' => 'Cup'],
            ['nama' => 'Roll'],
            ['nama' => 'Blister'],
            ['nama' => 'Galon'],
            ['nama' => 'Jar'],
            ['nama' => 'Liter'],
            ['nama' => 'Mililiter'],
        ];

        foreach ($satuan as $item) {
            ItemUnit::create($item);
        }
    }
}
