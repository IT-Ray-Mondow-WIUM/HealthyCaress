@extends('layouts.app')
@section('title', 'Services')
@section('content')
<div class="mt-2">
    <style>
        .nav-tabs .nav-link.active {
            background-color: #0d6efd;
            /* Bootstrap primary */
            color: #fff;
            border-radius: 5px;
        }

        .nav-tabs .nav-link:hover {
            background-color: #0d6efd;
            /* Bootstrap primary */
            color: #fff;
        }
    </style>

    <h2 class="mb-2">Poli Umum</h2>

    <div class="container-fluid mt-3">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#data-pasien">Data Pasien</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#pemeriksaan">Pemeriksaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#diagnosa">Diagnosa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tindakan">Tindakan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#resep">Resep</a>
            </li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content">
            <div id="data-pasien" class="tab-pane active"><br>
                <div class="card shadow rounded-4 overflow-hidden">
                    <!-- Header -->
                    <div class="card-header bg-primary text-white fw-semibold">
                        #{{ $patient['no_kartu'] }}
                    </div>

                    <!-- Body -->
                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <!-- Informasi Pasien -->
                        <table class="table table-striped table-sm table-responsive">
                            <tbody>
                                <tr>
                                    <td class="col-2">Nama</td>
                                    <td>:</td>
                                    <td>{{ $patient['nama'] }}</td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td>{{ $patient['no_identitas'] }}</td>
                                </tr>
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td>{{ ucfirst($registration->patient->religion->nama) }}</td>
                                </tr>
                                <tr>
                                    <td>T.T.L</td>
                                    <td>:</td>
                                    <td>{{ $patient['tempat_lahir'] }}, {{ $patient['tanggal_lahir'] }}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>{{ $patient['jenis_kelamin'] == 'l' ? 'Laki-laki' : 'Perempuan' }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td>:</td>
                                    <td>{{ $patient['telepon_mobile'] }} </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Foto Pasien -->
                        <div class="text-center mx-3 mt-3" style="max-width: 200px;">
                            <img src="{{ asset('storage/photos/'.$patient['images']) }}" alt="Foto Pasien"
                                class="shadow d-block mx-auto" style="width: 155px; height: 155px; object-fit: cover;">
                            <button class="btn btn-success btn-md w-100 mt-2">Rekam Medis</button>
                        </div>

                    </div>

                    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <!-- Informasi Pasien -->
                        <table class="table table-striped table-sm table-responsive">
                            <tbody>
                                <tr>
                                    <td class="col-2">Alamat</td>
                                    <td>:</td>
                                    <td>{{ $patient['alamat'] }}</td>
                                </tr>
                                <tr>
                                    <td class=""><small></small></td>
                                    <td></td>
                                    <td>
                                        <small>
                                            {{ $registration->patient->village->nama }},
                                            Kec.{{ $registration->patient->district->nama }},
                                            {{ $registration->patient->city->nama }},
                                            {{ $registration->patient->province->nama }}
                                        </small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Pekerjaan</td>
                                    <td>:</td>
                                    <td>{{ $registration->patient->job->nama }}</td>
                                </tr>
                                <tr>
                                    <td>IHS</td>
                                    <td>:</td>
                                    <td><input type="text" value="{{ $patient['ihs'] }}" disabled> <i
                                            class="bi bi-check2-all text-primary"></i></td>
                                </tr>
                                <tr>
                                    <td>BPJS</td>
                                    <td>:</td>
                                    <td><input type="text" value="" disabled> <i
                                            class="bi bi-check2-all text-primary"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div id="pemeriksaan" class="container tab-pane fade"><br>
                <p>Pemeriksaan Pasien</p>
            </div>
            <div id="diagnosa" class="container tab-pane fade"><br>
                <p>Diagnosa Pasien</p>
            </div>
            <div id="tindakan" class="container tab-pane fade"><br>
                <p>Tindakan</p>
            </div>
            <div id="resep" class="container tab-pane fade"><br>
                <p>Resep</p>
            </div>
        </div>
    </div>

</div>
@endsection