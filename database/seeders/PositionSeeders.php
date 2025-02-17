<?php

namespace Database\Seeders;

use App\Models\position;
use Illuminate\Database\Seeder;

class PositionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = ['SuperAdmin', 'DokterUmum', 'DokterGigi', 'Perawat', 'Admin', 'Keuangan', 'Farmasi', 'Bidan'];
        foreach ($list as $position) {
            position::create([
                'position' => $position
            ]);
        }
    }
}
