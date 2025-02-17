<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicServiceSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = ['UMUM', 'GIGI'];
        foreach ($list as $clinic) {
            Clinic::create([
                'name' => strtolower($clinic)
            ]);
        }
    }
}
