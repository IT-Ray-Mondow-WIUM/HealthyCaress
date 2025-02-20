<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
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
        dd($id);
    }
}
