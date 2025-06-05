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

    public function store(Request $request)
    {
        $create = position::create([
            'position' => $request->jabatan
        ]);

        if ($create) {
            return redirect()->route('position')->with('success', 'Data jabatan berhasil disimpan.');
        } else {
            dd("gagal menyimpan data jabatan");
        }
    }

    public function edit(Request $request)
    {
        // dd($request->all());
        $edit = position::updateOrCreate([
            'id' => $request->id
        ], [
            'position' => $request->jabatan
        ]);

        if ($edit) {
            return redirect()->route('position')->with('success', 'Data jabatan berhasil diubah.');
        } else {
            dd("gagal mengubah data jabatan");
        }
    }
}
