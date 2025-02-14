<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list_agama = ['ISLAM', 'PROTESTAN', 'KATOLIK', 'HINDU', 'BUDHA', 'KONGHUCU', 'ADVENT', 'KEPERCAYAAN'];
        foreach ($list_agama as $agama) {
            Religion::create([
                'nama' => strtolower($agama)
            ]);
        }
    }
}
