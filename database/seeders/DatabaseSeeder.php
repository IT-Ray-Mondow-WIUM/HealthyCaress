<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\employee;
use App\Models\Family_Relation;
use App\Models\Religion;
use App\Models\satuSehatCredentials;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Works;
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
        $this->call([
            UserSeeders::class,
            EmployeeSeeders::class,
            SatuSehatSeeders::class,

            ProvinceSeeders::class,
            CitySeeders::class,
            DistrictSeeders::class,
            VillageSeeders::class,


            // ReligionSeeders::class,
            // WorkSeeders::class,
            // FamilyRelationSeeders::class
        ]);
    }
}
