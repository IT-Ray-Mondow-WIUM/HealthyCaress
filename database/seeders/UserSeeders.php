<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'employee_id' => 1,
            'email' => 'admin@mail.co.id',
            'username' => 'admin',
            'password' => Hash::make('123')
        ]);

        User::create([
            'employee_id' => 2,
            'email' => 'dokterumum@mail.co.id',
            'username' => 'dokterumum',
            'password' => Hash::make('123')
        ]);

        User::create([
            'employee_id' => 3,
            'email' => 'doktergigi@mail.co.id',
            'username' => 'doktergigi',
            'password' => Hash::make('123')
        ]);
    }
}
