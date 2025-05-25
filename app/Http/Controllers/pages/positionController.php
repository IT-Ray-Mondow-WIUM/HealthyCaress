<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\position;
use Illuminate\Http\Request;

class positionController extends Controller
{
    public function index()
    {
        $getPosition = position::where('position', '<>', 'SuperAdmin')->orderBy('id')->get();
        return view("pages.position", ['jabatan' => $getPosition]);
    }
}
