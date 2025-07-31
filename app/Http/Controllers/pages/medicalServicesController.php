<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class medicalServicesController extends Controller
{
    public function index()
    {
        return view("pages.medical-services-view");
    }
}
