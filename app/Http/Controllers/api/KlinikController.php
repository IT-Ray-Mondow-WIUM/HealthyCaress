<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class KlinikController extends Controller
{
    // public function sendToBridge(Request $request)
    // {
    //     $client = new Client();

    //     try {
    //         $response = $client->request('POST', 'http://127.0.0.1:8080/api/bridge', [
    //             'headers' => [
    //                 'Accept' => 'application/json',
    //                 'Content-Type' => 'application/json'
    //             ],
    //             'json' => [
    //                 'title' => $request->input('title', 'Default Title'),
    //                 'body' => $request->input('body', 'Default Body'),
    //                 'userId' => $request->input('userId', 1),
    //             ],
    //         ]);

    //         return response()->json(json_decode($response->getBody(), true));
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    public function requestToken()
    {
        $response = Http::asForm()->post('http://127.0.0.1:8080/api/get-token', [
            'user_name' => 'Admin',
            'password' => Hash::make('123'),
            'client_id'     => env('SATUSEHAT_CLIENT_ID'),
            'client_secret' => env('SATUSEHAT_CLIENT_SECRET'),
        ]);
        return $response->json();
    }
}
