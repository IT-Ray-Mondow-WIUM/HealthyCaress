<?php

namespace Database\Seeders;

use App\Models\cities;
use App\Models\districts;
use App\Models\satuSehatCredentials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DistrictSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = $this->_getDataCityFromDB();
        if (!empty($cities)) {
            foreach ($cities as $city) {
                $districts = $this->_getDataDistrict($city);
                if (!empty($districts)) {
                    foreach ($districts as $value) {
                        // Simpan data distrik ke dalam tabel district
                        districts::updateOrCreate(
                            ['kode' => $value['code']], // Kondisi pencarian
                            [
                                'nama' => $value['name'],
                                'city_kode' => $city->kode,
                                // 'prov_kode' => $city->prov_kode, // ID provinsi dari kota
                            ]
                        );
                    }
                } else {
                    Log::warning('No district data found for city ' . $city->nama);
                }
            }
        } else {
            Log::warning('No city data found.');
        }
    }

    private function _getCredentialFromDB()
    {
        return satuSehatCredentials::select('organization_id', 'client_key', 'secret_key', 'access_token')->first();
    }

    private function _getDataCityFromDB()
    {
        // Ambil data kota beserta provinsi yang terkait
        return cities::with('provinsi')->get();
    }

    private function _getDataDistrict($city)
    {
        $credential = $this->_getCredentialFromDB();
        if ($credential) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $credential->access_token,
                'Accept' => 'application/json',
            ])->get('https://api-satusehat-stg.dto.kemkes.go.id/masterdata/v1/districts', [
                'city_codes' => $city->kode, // Menggunakan kode kota untuk request API
                'client_id' => env('API_CLIENT_KEY'),
                'client_secret' => env('API_SECRET_KEY'),
            ]);

            if ($response->successful()) {
                return $response->json()['data'] ?? [];
            } else {
                Log::error('Failed to fetch districts for city ' . $city->nama . ': ' . $response->status() . ' - ' . $response->body());
                return [];
            }
        } else {
            Log::error('No credential found in the database.');
            return [];
        }
    }
}
