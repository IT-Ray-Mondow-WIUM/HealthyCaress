@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg mx-auto border border-dark bg-secondary bg-opacity-10"
        style="max-width: 600px; height: auto;">
        <div class="card-body d-flex flex-column flex-md-row align-items-center">
            <!-- Kolom 1: Foto, Nama, Kutipan -->
            <div class="col-md-5 text-center text-md-center border-end my-3 my-md-auto">
                <img src="{{ asset('images/images1.jpg') }}" class="img-fluid rounded mb-2 border border-secondary"
                    style="max-height: 115px;" alt="Foto Profil">
                <h5 class="fw-bold">{{ auth()->user()->employee->nama }}</h5>
                <hr class="d-none d-md-block">
                <u><q><i>The large mistake it's come from close friend</i></q></u>
                <hr class="d-none d-md-block">
            </div>

            <!-- Kolom 2: Tabel Informasi -->
            <div class="col-md-7 ps-md-3 my-3 my-md-auto">
                <table class="table table-sm table-borderless">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 30%;">NIP</td>
                            <td class="fw-bold" style="width: 5%">:</td>
                            <td>{{ auth()->user()->employee->nip }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold" style="width: 30%;">NIK</td>
                            <td class="fw-bold" style="width: 5%">:</td>
                            <td>{{ auth()->user()->employee->nik }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Jabatan</td>
                            <td class="fw-bold">:</td>
                            <td>{{ auth()->user()->employee->position->position }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">No.Telepon</td>
                            <td class="fw-bold">:</td>
                            <td>{{ auth()->user()->employee->no_telp }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email</td>
                            <td class="fw-bold">:</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection