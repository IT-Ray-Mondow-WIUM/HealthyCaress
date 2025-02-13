<?php

namespace Database\Seeders;

use App\Models\employee;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        employee::create([
            'nip' => '0000000',
            'nama' => 'Admin',
            'jenis_kelamin' => 'l',
            'tanggal_lahir' => Carbon::createFromFormat('d-m-Y', '09-08-1997')->format('Y-m-d'),
            'no_telp' => '081234455667',
            'agama' => 'Kristen',
            'nik' => '1211232213317122',
        ]);
    }
}
