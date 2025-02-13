@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg mx-auto border border-dark bg-secondary bg-opacity-10" style="height: 525px;">
        <div class="card-body d-flex">
            <!-- Kolom 1: Foto, Nama, Jenis Kelamin -->
            <div class="col-5 text-center border-end my-auto">
                <img src="{{ asset('images/images1.jpg') }}" class="img-fluid rounded mb-2 border border-secondary"
                    style="max-height: 115px;" alt="Foto Profil">
                <h5 class="fw-bold">{{ auth()->user()->employee->nama }}</h5>
                <hr>
                <u><q><i>The large mistake it's come from close friend</i></q></u>
                <hr>
            </div>

            <!-- Kolom 2: Tabel Informasi -->
            <div class="col-7 ps-3 my-auto">
                <table class="table table-lg table-borderless">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 15%;">NIK</td>
                            <td class="fw-bold" style="width: 1%">:</td>
                            <td>{{ auth()->user()->employee->nik }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Jabatan</td>
                            <td class="fw-bold" style="width: 1%">:</td>
                            <td>Manager</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Departemen</td>
                            <td class="fw-bold" style="width: 1%">:</td>
                            <td>HRD</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email</td>
                            <td class="fw-bold" style="width: 1%">:</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Telepon</td>
                            <td class="fw-bold" style="width: 1%">:</td>
                            <td>{{ auth()->user()->employee->no_telp }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection