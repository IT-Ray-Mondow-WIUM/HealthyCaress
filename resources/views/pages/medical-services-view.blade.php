@extends('layouts.app')
@section('title', 'Services')
@section('content')
<div class="mt-2">
    <h2 class="mb-4">Poli Umum</h2>

    <!-- Kotak pencarian -->
    <div class="mb-3 d-flex justify-content-end">
        <input type="text" id="searchPoli" class="form-control form-control-sm w-25" placeholder="Cari pasien...">
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle" id="poliTable">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>No.Kartu</th>
                    <th>Nama</th>
                    <th>NIK</th>
                    <th>Tanggal Daftar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pendaftaran as $index => $pasien)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pasien->patient->no_kartu }}</td>
                    <td>{{ $pasien->patient->nama }}</td>
                    <td>{{ $pasien->patient->no_identitas }}</td>
                    <td>{{ $pasien->created_at->format('d M Y') }}</td>
                    <td class="text-center">
                        <form action="{{ route('general-clinic.show') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $pasien->id }}">
                            <button type="submit" class="btn btn-sm btn-info text-white">Pilih</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Tidak ada data pasien.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <!-- Script pencarian sederhana -->
    <script>
        document.getElementById("searchPoli").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#poliTable tbody tr");
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? "" : "none";
        });
    });
    </script>
</div>

@endsection