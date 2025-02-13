@extends('layouts.app')
@section('title', 'Registration')
@section('content')
<div class="container mt-2">
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

    <div class="container mt-4">
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
                    Old Patient
                </button>
            </li>
            <!-- Tab Pasien Baru -->
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="new-patient-tab" data-bs-toggle="tab" data-bs-target="#new-patient"
                    type="button" role="tab" aria-controls="new-patient" aria-selected="false">
                    New Patient
                </button>
            </li>
        </ul>

        <div class="tab-content mt-3" id="mainTabContent">
            <!-- Konten Pasien Lama -->
            <div class="tab-pane fade show active" id="list-patient" role="tabpanel" aria-labelledby="list-patient-tab">
                <div class="card p-3">
                    <h4>List Pasien</h4>
                </div>
            </div>
            <!-- Konten Pasien Lama -->
            <div class="tab-pane fade show" id="old-patient" role="tabpanel" aria-labelledby="old-patient-tab">
                <livewire:Registration.SearchPatient />
            </div>

            <!-- Konten Pasien Baru -->
            <div class="tab-pane fade" id="new-patient" role="tabpanel" aria-labelledby="new-patient-tab">
                <div class="card p-3">
                    <h5>New Patient Information</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection