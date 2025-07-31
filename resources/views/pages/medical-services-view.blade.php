@extends('layouts.app')
@section('title', 'Services')
@section('content')
<div class="mt-2">
    <h2 class="mb-4">Poli Umum</h2>

    <div class="table-responsive rounded shadow-sm">
        <table class="table table-hover align-middle">
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
                    <td colspan="5" class="text-center text-muted">Tidak ada data pasien.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection