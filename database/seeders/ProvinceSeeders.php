<?php

namespace Database\Seeders;

use App\Models\Provinces;
use App\Models\satuSehatCredentials;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProvinceSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->_reGeneratedToken();
        $prov = $this->_getDataProv()['data'] ?? [];
        if (!empty($prov)) {
            foreach ($prov as $value) {
                Provinces::updateOrCreate(
                    ['kode' => $value['code']], // Kondisi pencarian
                    [
                        'nama' => $value['name'],
                        'kode' => $value['code']
                    ]
                );
            }
        } else {
            Log::warning('No province data found or API request failed.');
        }
    }

    private function credential()
    {
        return satuSehatCredentials::select('organization_id', 'client_key', 'secret_key', 'access_token')->first();
    }

    private function _reGeneratedToken()
    {
        $credential = $this->credential();
        $regenerateToken = Http::asForm()->post(env('API_SATU_SEHAT_AUTH_URL') . '/accesstoken?grant_type=client_credentials', [
            'client_id' => $credential->client_key,
            'client_secret' => $credential->secret_key,
        ]);

        if ($regenerateToken->successful()) {

            // =====> Lakukan Penyimpanan Token Ke database
            $credentialToken = satuSehatCredentials::updateOrCreate(
                ['organization_id' => $credential->organization_id],
                ['access_token' => $regenerateToken->json('access_token')]
            );

            if (!$credentialToken) {
                Log::error('Failed to save Token ');
                return [];
            }
        } else {
            Log::error('Failed to Get Token: ' . $regenerateToken->status() . ' - ' . $regenerateToken->body());
            return [];
        }
    }

    private function _getDataProv()
    {
        $credential = $this->credential();

        if ($credential) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $credential->access_token,
                'Accept' => 'application/json',
            ])->get('https://api-satusehat-stg.dto.kemkes.go.id/masterdata/v1/provinces', [
                'client_id' => env('API_CLIENT_KEY'),
                'client_secret' => env('API_SECRET_KEY'),
            ]);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('Failed to fetch provinces: ' . $response->status() . ' - ' . $response->body());
                return [];
            }
        }

        Log::error('No credential found in the database.');
        return [];
    }
}
