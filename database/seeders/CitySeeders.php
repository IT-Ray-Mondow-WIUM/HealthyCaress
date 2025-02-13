<?php

namespace Database\Seeders;

use App\Models\cities;
use App\Models\Provinces;
use App\Models\satuSehatCredentials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CitySeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = $this->_getDataCity();
        if (!empty($cities)) {
            foreach ($cities as $value) {
                // Simpan data kota ke dalam tabel
                cities::updateOrCreate(
                    ['kode' => $value['code']], // Kondisi pencarian
                    [
                        'nama' => $value['name'],
                        'province_kode' => $value['parent_code'] // Ganti dengan kolom yang sesuai
                    ]
                );
            }
        } else {
            Log::warning('No city data found.');
        }
    }

    private function _getCredentialFromDB()
    {
        return satuSehatCredentials::select('organization_id', 'client_key', 'secret_key', 'access_token')->first();
    }

    private function _getDataProvFromDB()
    {
        return Provinces::select('kode')->get();
    }

    private function _getDataCity()
    {
        $credential = $this->_getCredentialFromDB();
        $prov = $this->_getDataProvFromDB();
        $allCities = [];

        if ($credential) {
            foreach ($prov as $prov_id) {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $credential->access_token,
                    'Accept' => 'application/json',
                ])->get('https://api-satusehat-stg.dto.kemkes.go.id/masterdata/v1/cities', [
                    'province_codes' => $prov_id->kode,
                    'client_id' => env('API_CLIENT_KEY'),
                    'client_secret' => env('API_SECRET_KEY'),
                ]);

                if ($response->successful()) {
                    $allCities = array_merge($allCities, $response->json()['data'] ?? []);
                } else {
                    Log::error('Failed to fetch cities for province ' . $prov_id->kode . ': ' . $response->status() . ' - ' . $response->body());
                }
            }
        } else {
            Log::error('No credential found in the database.');
        }

        return $allCities;
    }
}
