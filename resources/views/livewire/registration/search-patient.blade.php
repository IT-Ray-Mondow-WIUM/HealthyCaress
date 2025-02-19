<div class="container-fluid">
    <style>
        .list-group {
            z-index: 1050;
            /* Lebih tinggi dari card */
            position: absolute;
            background-color: white;
            /* Supaya tidak transparan */
            width: 100%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            /* Efek bayangan */
            border-radius: 5px;
        }
    </style>

    <div class="position-relative">
        <input type="text" class="form-control" wire:model.live="query" placeholder="Cari Pasien..." wire:ignore />

        @if(!empty($patients))
        <ul class="list-group mt-1">
            @foreach($patients as $patient)
            <li class="list-group-item list-group-item-action" wire:click="selectPatient({{ $patient->id }})">
                {{ $patient->no_kartu }} / {{ $patient->no_rm }} / {{ $patient->nama }}
            </li>
            @endforeach
        </ul>
        @endif
    </div>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                <h5 class="mb-0">Patient Information</h5>
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <!-- Foto Pasien -->
                    <div class="col-md-4 text-center">
                        @isset($selectedPatient)
                        @if($selectedPatient->images)
                        <img src="{{ asset('storage/photos/' . $selectedPatient->images) }}"
                            class="img-thumbnail border border-rounded" alt="Foto Pasien">
                        @else
                        <img src="{{ asset('images/images1.jpg') }}" class="img-thumbnail border border-rounded"
                            alt="Foto Pasien" height="173" width="184">
                        @endif
                        @else
                        <img src="{{ asset('images/images1.jpg') }}" class="img-thumbnail border border-rounded"
                            alt="Foto Pasien" height="173" width="184">
                        @endisset

                    </div>
                    <!-- Detail Pasien -->
                    <div class="col-md-8">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 30%"><b>Nama</b></td>
                                    <td style="width: 5%">:</td>
                                    <td>{{ $selectedPatient->nama ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Jenis Kelamin</b></td>
                                    <td>:</td>
                                    <td>{{ ucfirst($selectedPatient->jenis_kelamin?? '')}}</td>
                                </tr>
                                <tr>
                                    <td><b>NIK</b></td>
                                    <td>:</td>
                                    <td>{{ $selectedPatient->no_identitas ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><b>No RM</b></td>
                                    <td>:</td>
                                    <td>{{ $selectedPatient->no_rm ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Umur</b></td>
                                    <td>:</td>
                                    <td>{{ $umur }}, Tahun
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-header bg-primary text-white text-center">
                <sma class="mt-0"></sma>
            </div>
        </div>
    </div>
</div>