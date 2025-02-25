<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use App\Models\Registration;
use Illuminate\Http\Request;

class patientController extends Controller
{
    public function index()
    {
        $getPatient = Pasien::orderBy('nama')->get();
        return view('pages.patient', ['pasien' => $getPatient]);
    }

    public function edit($id)
    {
        $pasien = Pasien::find($id);
        $registration = Registration::where('patient_id', $id)->get();
        return view('patient.edit', ['patient' => $pasien, 'registration' => $registration]);
    }
}
