<?php

namespace Database\Seeders;

use App\Models\familyRelation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class familyRelationSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            'Anak laki-laki',
            'Anak perempuan',
            'Ayah',
            'Ayah mertua',
            'Bibi',
            'Cucu',
            'Diri sendiri',
            'Ibu',
            'Ibu mertua',
            'Ipar laki-laki',
            'Ipar perempuan',
            'Istri',
            'Kakek',
            'Keponakan',
            'Lain-lain',
            'Menantu laki-laki',
            'Menantu perempuan',
            'Nenek',
            'Paman',
            'Saudara',
            'Saudari',
            'Sepupu',
            'Suami'
        ];

        foreach ($list as $item) {
            familyRelation::create(['hubungan' => $item]);
        }
    }
}
