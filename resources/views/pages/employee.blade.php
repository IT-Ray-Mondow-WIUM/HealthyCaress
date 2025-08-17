@extends('layouts.app')
{{-- Alerts Section --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
    <i class="bi bi-check-circle-fill"></i> <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
    <i class="bi bi-exclamation-triangle-fill"></i> <strong>Gagal!</strong> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
</div>
@endif

@section('title', 'Employee')
@section('content')
<div class="mt-2">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-people-fill"></i> Halaman Pegawai</h5>
            <button type="button" class="btn btn-light btn-sm text-primary" data-bs-toggle="modal"
                data-bs-target="#newEmployee">
                <i class="bi bi-person-plus-fill"></i> Tambah Pegawai
            </button>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 525px; overflow-y:auto;">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>No Telepon</th>
                            <th>Jabatan</th>
                            <th style="width:120px;">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pegawai as $employee)
                        <tr>
                            <td class="fw-semibold text-center">{{ $employee->nip }}</td>
                            <td>{{ $employee->nama }}</td>
                            <td class="text-center">
                                @if($employee->jenis_kelamin == 'l')
                                <span class="badge bg-success">Laki-Laki</span>
                                @else
                                <span class="badge bg-warning">Perempuan</span>
                                @endif
                            </td>
                            <td class="text-center">{{ $employee->no_telp }}</td>
                            <td>{{ $employee->position->position }}</td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <button type="button" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-inbox"></i> Belum ada data pegawai
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Pegawai -->
    <div class="modal fade" id="newEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        <i class="bi bi-person-plus-fill"></i> Tambah Pegawai
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <form action="{{ Route('employee.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nip" class="form-label">NIP <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="nip" name="nip" readonly value="{{ $nip }}">
                                <div class="form-text text-danger">Auto Generated</div>
                            </div>
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="nik" name="nik" maxlength="16"
                                    minlength="16" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nama" class="form-label">Nama <sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Jenis Kelamin <sup class="text-danger">*</sup></label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin1"
                                        value="l">
                                    <label class="form-check-label" for="jenisKelamin1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin2"
                                        value="p">
                                    <label class="form-check-label" for="jenisKelamin2">Perempuan</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir <sup
                                        class="text-danger">*</sup></label>
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
                            </div>
                            <div class="col-md-6">
                                <label for="agama" class="form-label">Agama <sup class="text-danger">*</sup></label>
                                <select class="form-select" id="agama" name="agama" required>
                                    <option value="">== Pilih Agama ==</option>
                                    @foreach ($agama as $list)
                                    <option value="{{ ucfirst($list['nama']) }}">{{ ucfirst($list['nama']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="nomorTelepon" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="nomorTelepon" name="nomorTelepon"
                                    maxlength="12">
                            </div>
                            <div class="col-md-6">
                                <label for="jabatan" class="form-label">Jabatan <sup class="text-danger">*</sup></label>
                                <select class="form-select" id="jabatan" name="jabatan" required>
                                    <option value="">== Pilih Jabatan ==</option>
                                    @foreach ($jabatan as $list)
                                    <option value="{{ $list['id'] }}">{{ $list['position'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-send-check-fill"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection