<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Http\Request;

class registrationController extends Controller
{
    public function index()
    {
        $registration_list = Registration::whereMonth('tanggal', today()->format('m'))->orderBy('created_at', 'desc')->get();
        return view('pages.registration', ['registration' => $registration_list]);
    }
}
