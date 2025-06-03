@extends('layouts.app')
{{-- Alerts Section --}}
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Gagal!</strong> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
</div>
@endif

@section('title', 'Employee')
@section('content')
<div class="mt-2">
    <h4>Halaman Pegawai</h4>

    <div class="container-fluid border border-primary py-1 table-responsive" style="height: 525px;">
        <table class="table table-striped table-bordered table-sm">
            <thead class="text-center">
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawai as $employee)
                <tr>
                    <td>{{ $employee->nip }}</td>
                    <td>{{ $employee->nama }}</td>
                    <td>{{ $employee->jenis_kelamin }}</td>
                    <td>{{ $employee->no_telp }}</td>
                    <td>{{ $employee->position->position }}</td>
                    <td style="white-space: nowrap;" class="text-center">
                        <a href="#" class="btn btn-sm btn-info">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger text-light">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container-fluid mt-1 text-end">
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#newEmployee"><i
                class="bi bi-person-plus-fill"></i></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newEmployee" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-person-plus-fill"></i> Tambah
                        Pegawai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('employee.add') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3 align-items-center">
                            <label for="nip" class="col-sm-2 col-form-label">NIP<sup class="text-danger">*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nip" name="nip" readonly value="{{ $nip }}">
                                <i class="form-text text-danger">Auto Generated</i>
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="nik" class="col-sm-2 col-form-label">NIK<sup class="text-danger">*</sup></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nik" name="nik" maxlength="16"
                                    minlength="16" required>
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="nama" class="col-sm-2 col-form-label">Nama<sup
                                    class="text-danger">*</sup></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin<sup
                                    class="text-danger">*</sup></label>
                            <div class="col-sm-6">
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
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="tanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir<sup
                                    class="text-danger">*</sup></label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="tanggalLahir" name="tanggalLahir" required>
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="agama" class="col-sm-2 col-form-label">Agama<sup
                                    class="text-danger">*</sup></label>
                            <div class="col-sm-6">
                                <select class="form-select" id="agama" name="agama" required>
                                    <option value="">== Pilih Agama ==</option>
                                    @foreach ($agama as $list)
                                    <option value="{{ ucfirst($list['nama']) }}">{{
                                        ucfirst($list['nama']) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="nomorTelepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nomorTelepon" name="nomorTelepon"
                                    maxlength="12">
                            </div>
                        </div>

                        <div class="row mb-3 align-items-center">
                            <label for="jabatan" class="col-sm-2 col-form-label">Jabatan<sup
                                    class="text-danger">*</sup></label>
                            <div class="col-sm-6">
                                <select class="form-select" id="jabatan" name="jabatan" required>
                                    <option value="">== Pilih Jabatan ==</option>
                                    @foreach ($jabatan as $list)
                                    <option value="{{ $list['id'] }}">{{
                                        $list['position'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection