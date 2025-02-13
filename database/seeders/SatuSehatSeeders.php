<?php

namespace Database\Seeders;

use App\Models\satuSehatCredentials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuSehatSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        satuSehatCredentials::create([
            'organization_id' => 'e542c8c8-07b9-497f-a03b-59f34d3685dc',
            'client_key' => "uRFgOZJtGv0ezEjVqUf5a6CRfGjKasCi5RzB4HiMvyHQcsFJ",
            'secret_key' => "NKAmjdWIh26DxnwDoZ3KVMKY1u2CxwUySNfE11knCVGFmdpdB9hrR3kXf6GrQui2",
        ]);
    }
}
