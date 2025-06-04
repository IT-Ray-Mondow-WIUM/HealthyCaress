<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\employee;
use App\Models\position;
use App\Models\Religion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class employeeController extends Controller
{
    public function index()
    {
        $getEmployee = employee::where('nama', '<>', 'Admin')->orderBy('nip')->get();
        $getPosition = position::where('position', '<>', 'SuperAdmin')->orderBy('id')->get();
        $getReligion = Religion::orderBy('id')->get();
        $dataNIP = $this->generateNip($getEmployee);
        return view('pages.employee', ['pegawai' => $getEmployee, 'jabatan' => $getPosition, 'nip' => $dataNIP, 'agama' => $getReligion]);
    }

    public function store(Request $request)
    {
        $employee = employee::create([
            'nip' => $request->input('nip'),
            'nik' => $request->input('nik'),
            'nama' => $request->input('nama'),
            'jenis_kelamin' => $request->input('jenisKelamin'),
            'tanggal_lahir' => $request->input('tanggalLahir'),
            'agama' => $request->input('agama'),
            'no_telp' => $request->input('nomorTelepon'),
            'position_id' => $request->input('jabatan'),
        ]);

        if ($employee) {
            $username = strtolower(explode(' ', trim($request->input('nama')))[0]);
            $user = user::create([
                'employee_id' => $employee->id,
                'email' => $username . "@mail.co.id",
                'password' => Hash::make('123'),
                'username' => $username
            ]);
            if ($user) {
                return redirect()->route('employee')->with('success', 'Data pegawai berhasil disimpan.');
            } else {
                return back()->with('error', 'Gagal menyimpan data pegawai.');
            }
        } else {
            // Simpan gagal
            return back()->with('error', 'Gagal menyimpan data pegawai.');
        }
    }

    private function generateNip($nips)
    {
        $start = 1000001;

        foreach ($nips as $i => $nip) {
            if ($nip->nip != $start) {
                // Ketemu celah
                return str_pad($start, 7, '0', STR_PAD_LEFT);
            }
            $start++;
        }

        // Jika tidak ada celah, lanjutkan ke angka selanjutnya
        return str_pad($start, 7, '0', STR_PAD_LEFT);
    }
}
