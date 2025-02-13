<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\employee;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'employee_id' => 1,
            'email' => 'admin@mail.co.id',
            'username' => 'admin',
            'password' => Hash::make('123')
        ]);

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
