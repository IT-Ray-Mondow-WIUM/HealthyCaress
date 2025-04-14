@extends('layouts.app')
@section('title', 'Patient')
@section('content')
<div class="mt-2">
    <style>
        .profile-img {
            width: 100%;
            max-width: 300px;
            height: 225px;
            border-radius: 10px;
            object-fit: cover;
        }

        .form-container {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <!-- Kolom Kiri - Foto -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('storage/photos/' . $patient->images) }}" alt="Profile Picture"
                        class="profile-img img-thumbnail">
                    <div class="my-2">
                        <button class="btn btn-outline-primary btn-sm" disabled>Change Photo</button>
                    </div>
                </div>

                <!-- Kolom Kanan - Form -->
                <div class="col-md-8">
                    <div class="form-container shadow p-4">
                        <h4 class="text-center mb-4 border-top border-bottom border-dark py-3">Ubah Informasi
                            Pasien</h4>
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="noRm" class="form-label">Nomor Rekam Medis</label>
                                <input type="text" class="form-control" id="noRm" name="noRm"
                                    value="{{ $patient->no_rm }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label"><i class="bi bi-pen-fill text-danger"></i> Nama
                                    Pasien</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $patient->nama }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label"><i class="bi bi-pen-fill text-danger"></i> Nomor
                                    Telepon</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                    value="{{ $patient->telepon_mobile }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label"><i class="bi bi-pen-fill text-danger"></i> Tanggal
                                    Lahir</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    value="{{ $patient->tanggal_lahir }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="NIK" class="form-label"><i class="bi bi-pen-fill text-danger"></i> No Induk
                                    / NIK</label>
                                <input type="text" class="form-control" id="NIK" name="NIK"
                                    value="{{ $patient->no_identitas }}" required>
                            </div>
                            <div class="d-flex justify-content-end border-top border-dark pt-3">
                                <a href="{{ route('patient') }}" class="btn btn-danger btn-sm me-2">Kembali</a>
                                <button type="reset" class="btn btn-warning btn-sm me-2">Reset</button>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- End Kolom Kanan -->
            </div>
        </div>
    </div>

    <div class="container-fluid my-2" style="height: 525px;">
        <h4 class="text-start mb-4 border-top border-bottom border-dark py-2">Informasi Detail Pasien</h4>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs justify-content-start" id="myTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button"
                    role="tab">
                    Riwayat Medis
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button"
                    role="tab">
                    Status BPJS
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button"
                    role="tab">
                    Status SatuSehat
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="myTabsContent">
            <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                <div class="container-fluid table-responsive">
                    <table class="table table-hover table-bordered table-striped table-sm">
                        <thead class="table-secondary">
                            <tr class="text-center">
                                <th>Tanggal</th>
                                <th>Poli</th>
                                <th>Dokter</th>
                                <th>Jenis Pendaftaran</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registration as $item)
                            <tr>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ ucfirst($item->clinic->name) }}</td>
                                <td>{{ $item->doctor->employee->nama }}</td>
                                <td>{{ $item->jenis_pendaftaran }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-info text-dark">
                                        <i class="bi bi-eye-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="tab2" role="tabpanel">
                <h4>Content for Tab 2</h4>
                <p>This is the content inside the second tab.</p>
            </div>
            <div class="tab-pane fade" id="tab3" role="tabpanel">
                <h4>Content for Tab 3</h4>
                <p>This is the content inside the third tab.</p>
            </div>
        </div>
    </div>
</div>
@endsection