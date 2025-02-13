<?php

namespace Database\Seeders;

use App\Models\districts;
use App\Models\satuSehatCredentials;
use App\Models\villages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class VillageSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $villages = $this->_getDataVillage();
        if (!empty($villages)) {
            foreach ($villages as $value) {
                // Simpan data kota ke dalam tabel
                villages::updateOrCreate(
                    ['kode' => $value['code']], // Kondisi pencarian
                    [
                        'nama' => $value['name'],
                        'district_kode' => $value['parent_code'] // Ganti dengan kolom yang sesuai
                    ]
                );
            }
        } else {
            Log::warning('No village data found.');
        }
    }
    private function _getCredentialFromDB()
    {
        return satuSehatCredentials::select('organization_id', 'client_key', 'secret_key', 'access_token')->first();
    }

    private function _getDataDistrictFromDB($start, $end)
    {
        return districts::select('kode')
            ->whereBetween('id', [$start, $end])
            ->get();;
    }

    private function _getDataVillage()
    {
        $credential = $this->_getCredentialFromDB();
        $dist = $this->_getDataDistrictFromDB(2501, 2790);
        $allVillage = [];

        if ($credential) {
            foreach ($dist as $dist_id) {
                $response = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $credential->access_token,
                    'Accept' => 'application/json',
                ])->get('https://api-satusehat-stg.dto.kemkes.go.id/masterdata/v1/sub-districts', [
                    'district_codes' => $dist_id->kode,
                    'client_id' => env('API_CLIENT_KEY'),
                    'client_secret' => env('API_SECRET_KEY'),
                ]);

                if ($response->successful()) {
                    $allVillage = array_merge($allVillage, $response->json()['data'] ?? []);
                } else {
                    Log::error('Failed to fetch villages for district ' . $dist_id->kode . ': ' . $response->status() . ' - ' . $response->body());
                }
            }
        } else {
            Log::error('No credential found in the database.');
        }

        return $allVillage;
    }
}
