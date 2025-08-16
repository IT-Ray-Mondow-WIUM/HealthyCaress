<div class="card shadow rounded-4 overflow-hidden">
    <!-- Header -->
    <div class="card-header bg-primary text-white fw-semibold">
        #{{ $patient['no_kartu'] }}
    </div>

    <!-- Informasi Utama -->
    <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-start gap-3">
        <!-- Informasi Pasien -->
        <div class="table-responsive w-100">
            <table class="table table-striped table-sm">
                <tbody>
                    <tr>
                        <td class="col-3">Nama</td>
                        <td>:</td>
                        <td>{{ $patient['nama'] }}, ({{ $ages ?? '-' }} Thn)</td>
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
                        <td>{{ $patient['telepon_mobile'] }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Foto Pasien -->
        <div class="text-center mx-auto mt-3" style="max-width: 200px;">
            <img src="{{ asset('storage/photos/'.$patient['images']) }}" alt="Foto Pasien"
                class="shadow d-block mx-auto" style="width: 155px; height: 155px; object-fit: cover;">
            <button class="btn btn-success btn-md w-100 mt-2">Rekam Medis</button>
        </div>
    </div>

    <div class="card-header bg-primary text-white fw-semibold p-3">
    </div>
</div>