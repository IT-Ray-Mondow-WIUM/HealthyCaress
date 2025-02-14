<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class registrationController extends Controller
{
    public function index()
    {
        $registration_list = Registration::all();
        return view('pages.registration', ['registration' => $registration_list]);
    }
}
