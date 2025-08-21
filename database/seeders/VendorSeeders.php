<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [];

        // 10 Vendor Obat
        for ($i = 1; $i <= 10; $i++) {
            $vendors[] = [
                'nama' => "Vendor Obat $i",
                'kode' => "OBT$i",
                'alamat' => "Jl. Obat No.$i",
                'kota' => "Jakarta",
                'telepon' => "081200000$i",
            ];
        }

        // 5 Vendor Vaksin
        for ($i = 1; $i <= 5; $i++) {
            $vendors[] = [
                'nama' => "Vendor Vaksin $i",
                'kode' => "VKS$i",
                'alamat' => "Jl. Vaksin No.$i",
                'kota' => "Bandung",
                'telepon' => "081210000$i",
            ];
        }

        // 10 Vendor BHP
        for ($i = 1; $i <= 10; $i++) {
            $vendors[] = [
                'nama' => "Vendor BHP $i",
                'kode' => "BHP$i",
                'alamat' => "Jl. BHP No.$i",
                'kota' => "Surabaya",
                'telepon' => "081220000$i",
            ];
        }

        // 5 Vendor Alat Kesehatan
        for ($i = 1; $i <= 5; $i++) {
            $vendors[] = [
                'nama' => "Vendor Alkes $i",
                'kode' => "ALK$i",
                'alamat' => "Jl. Alkes No.$i",
                'kota' => "Semarang",
                'telepon' => "081230000$i",
            ];
        }

        // 10 Vendor Umum
        for ($i = 1; $i <= 10; $i++) {
            $vendors[] = [
                'nama' => "Vendor Umum $i",
                'kode' => "UMM$i",
                'alamat' => "Jl. Umum No.$i",
                'kota' => "Medan",
                'telepon' => "081240000$i",
            ];
        }

        // 10 Vendor Gizi
        for ($i = 1; $i <= 10; $i++) {
            $vendors[] = [
                'nama' => "Vendor Gizi $i",
                'kode' => "GZ$i",
                'alamat' => "Jl. Gizi No.$i",
                'kota' => "Yogyakarta",
                'telepon' => "081250000$i",
            ];
        }

        foreach ($vendors as $item) {
            Vendor::create($item);
        }
    }
}
