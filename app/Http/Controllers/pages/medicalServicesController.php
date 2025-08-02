<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class medicalServicesController extends Controller
{
    public function index()
    {
        $pendaftaran = Registration::where('clinic_id', 1)->whereDate('created_at', Carbon::today())->orderBy('created_at', 'desc')->get();
        return view("pages.medical-services-view", ["pendaftaran" => $pendaftaran]);
    }

    public function show(Request $request)
    {
        $idpasien = Registration::findOrFail($request['id']);
        $pasien = $idpasien->patient->toArray();
        return view('services.general-clinic-view', ['patient' => $pasien, 'registration' => $idpasien]);
        // dd($agama);
    }
}
