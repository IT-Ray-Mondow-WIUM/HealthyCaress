@extends('layouts.app')
@section('title', 'Profile')
@section('content')
<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden mx-auto" style="max-width: 750px;">
        <!-- Header Background -->
        <div class=" bg-primary" style="height: 77px;">
        </div>

        <!-- Foto Profil -->
        <div class="text-center" style="margin-top: -70px;">
            <img src="{{ asset('images/images1.jpg') }}" class="rounded-circle border border-3 border-white shadow"
                style="width: 140px; height: 140px; object-fit: cover;" alt="Foto Profil">
            <h4 class="mt-3 fw-bold">{{ auth()->user()->employee->nama }}</h4>
            <p class="text-muted fst-italic mb-1">“The large mistake it's come from close friend”</p>
            <hr class="w-50 mx-auto">
        </div>

        <!-- Informasi Profil -->
        <div class="card-body px-4 py-3">
            <h5 class="fw-bold text-primary mb-3">Informasi Pegawai</h5>
            <div class="table-responsive">
                <table class="table table-borderless table-sm">
                    <tbody>
                        <tr>
                            <td class="fw-bold" style="width: 30%;">NIP</td>
                            <td style="width: 5%">:</td>
                            <td>{{ auth()->user()->employee->nip }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">NIK</td>
                            <td>:</td>
                            <td>{{ auth()->user()->employee->nik }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Jabatan</td>
                            <td>:</td>
                            <td>{{ auth()->user()->employee->position->position }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">No. Telepon</td>
                            <td>:</td>
                            <td>{{ auth()->user()->employee->no_telp }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Email</td>
                            <td>:</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-end mt-3 gap-2">
                <button class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-person-fill-lock"></i> Change Password
                </button>
                {{-- <button class="btn btn-sm btn-outline-danger">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button> --}}
            </div>
        </div>
    </div>
</div>

@endsection