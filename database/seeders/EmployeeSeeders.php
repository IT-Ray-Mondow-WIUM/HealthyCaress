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
            'position_id' => 1
        ]);

        employee::create([
            'nip' => '1000001',
            'nama' => 'dr. Alexander',
            'jenis_kelamin' => 'l',
            'tanggal_lahir' => Carbon::createFromFormat('d-m-Y', '01-01-1994')->format('Y-m-d'),
            'no_telp' => '081234455666',
            'agama' => 'Kristen',
            'nik' => '7209061211900001',
            'position_id' => 2
        ]);

        employee::create([
            'nip' => '1000002',
            'nama' => 'dr. Olivia Kirana, Sp.OG',
            'jenis_kelamin' => 'p',
            'tanggal_lahir' => Carbon::createFromFormat('d-m-Y', '06-06-1984')->format('Y-m-d'),
            'no_telp' => '081234455666',
            'agama' => 'Kristen',
            'nik' => '3217040109800006',
            'position_id' => 3
        ]);
    }
}
