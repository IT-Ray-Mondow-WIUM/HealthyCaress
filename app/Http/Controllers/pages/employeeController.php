<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\employee;
use Illuminate\Http\Request;

class employeeController extends Controller
{
    public function index()
    {
        $getEmployee = employee::where('nama', '<>', 'Admin')->orderBy('nama')->get();
        return view('pages.employee', ['pegawai' => $getEmployee]);
    }
}
