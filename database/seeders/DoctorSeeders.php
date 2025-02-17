<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoctorSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doctor::create([
            'clinic_id' => '1',
            'employee_id' => '2',
            'ihs' => '10009880728',
        ]);
        Doctor::create([
            'clinic_id' => '2',
            'employee_id' => '3',
            'ihs' => '10002074224',
        ]);
    }
}
