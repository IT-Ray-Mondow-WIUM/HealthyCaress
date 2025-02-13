@extends('layouts.app')
@section('title', 'Registration')
@section('content')
<div class="container mt-2">
    <div class="container mt-4">
        <ul class="nav nav-tabs" id="mainTab" role="tablist">
            <!-- Tab Pasien Lama -->
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="old-patient-tab" data-bs-toggle="tab" data-bs-target="#old-patient"
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
            <div class="tab-pane fade show active" id="old-patient" role="tabpanel" aria-labelledby="old-patient-tab">
                <div class="card p-3">
                    <h5>Old Patient Information</h5>
                    <p>This section contains details for returning patients.</p>
                </div>
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