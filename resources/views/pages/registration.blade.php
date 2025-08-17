@extends('layouts.app')
@section('title', 'Registration')
@section('content')
<div class="container-fluid mt-2">
    <style>
        /* Efek transisi halus */
        .nav-tabs .nav-link {
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        /* Warna background untuk tab yang aktif */
        .nav-tabs .nav-link.active {
            background-color: #0d6efd !important;
            /* Ganti dengan warna yang diinginkan */
            color: white !important;
            border-color: #0d6efd !important;
            font-weight: bold;
            /* Biar tab aktif lebih menonjol */
            border-radius: 8px 8px 0 0;
            /* Bikin sudut atas tab melengkung */
        }

        /* Warna background saat hover */
        .nav-tabs .nav-link:hover {
            background-color: #0b5ed7 !important;
            /* Warna lebih gelap saat hover */
            color: white !important;
        }
    </style>

    <div class=" mt-4">
        <ul class="nav nav-tabs" id="mainTab" role="tablist">
            <!-- Tab Pasien Lama -->
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="list-patient-tab" data-bs-toggle="tab"
                    data-bs-target="#list-patient" type="button" role="tab" aria-controls="list-patient"
                    aria-selected="true">
                    Patient List
                </button>
            </li>
            <!-- Tab Pasien Lama -->
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="old-patient-tab" data-bs-toggle="tab" data-bs-target="#old-patient"
                    type="button" role="tab" aria-controls="old-patient" aria-selected="true">
                    <i class="bi bi-plus-circle-fill"></i> Add Old Patient
                </button>
            </li>
            <!-- Tab Pasien Baru -->
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="new-patient-tab" data-bs-toggle="tab" data-bs-target="#new-patient"
                    type="button" role="tab" aria-controls="new-patient" aria-selected="false">
                    <i class="bi bi-plus-circle-fill"></i> Add New Patient
                </button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="mainTabContent">
            <!-- Konten Pasien Lama -->
            <div class="tab-pane fade show active" id="list-patient" role="tabpanel" aria-labelledby="list-patient-tab">
                <div class="container p-1">

                    <!-- Kotak Pencarian -->
                    <div class="mb-2 d-flex justify-content-end">
                        <input type="text" id="searchPatient" class="form-control form-control-sm w-25"
                            placeholder="Cari pasien...">
                    </div>

                    <div style="overflow-x: auto;">
                        <table class="table table-striped table-hover table-bordered table-sm" id="patientTable">
                            <thead class="table-light">
                                <tr>
                                    <th colspan="7" class="text-center">Patient Registration List</th>
                                </tr>
                            </thead>
                            <thead class="table-info">
                                <tr class="text-center">
                                    <th scope='col'>No Kartu</th>
                                    <th scope='col'>Nama</th>
                                    <th scope='col'>Tanggal</th>
                                    <th scope='col'>Alamat</th>
                                    <th scope='col'>Jenis Pasien</th>
                                    <th scope='col'>Poliklinik</th>
                                    <th scope='col'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($registration as $key=>$list)
                                <tr>
                                    <td class="text-center">{{ $list->patient->no_kartu }}</td>
                                    <td>{{ $list->patient->nama }}</td>
                                    <td class="text-center">{{ $list->created_at->format('d M, Y') }}</td>
                                    <td>{{ $list->patient->alamat }}</td>
                                    <td>Pasien {{ $list->jenis_pasien }}</td>
                                    <td class="text-center">{{ ucfirst($list->clinic->name) }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr class="text-center">
                                    <td colspan="7">Tidak Ada Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Konten Pasien Lama -->
            <div class="tab-pane fade show" id="old-patient" role="tabpanel" aria-labelledby="old-patient-tab">
                <livewire:Registration.OldPatientForm />
            </div>

            <!-- Konten Pasien Baru -->
            <div class="tab-pane fade" id="new-patient" role="tabpanel" aria-labelledby="new-patient-tab">
                <livewire:Registration.NewPatientForm />
            </div>
        </div>
    </div>



    <!-- Script pencarian sederhana -->
    <script>
        document.getElementById("searchPatient").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#patientTable tbody tr");
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? "" : "none";
        });
    });
    </script>
</div>
@endsection