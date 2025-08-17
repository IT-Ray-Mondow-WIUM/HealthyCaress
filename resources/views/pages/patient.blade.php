@extends('layouts.app')
@section('title', 'Patient')
@section('content')
<div class="mt-2">
    <h4>Halaman Pasien</h4>

    <div class="container-fluid">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0"><i class="bi bi-people-fill"></i> Daftar Pasien</h6>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive" style="max-height: 525px; overflow-y:auto;">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-primary text-center">
                            <tr>
                                <th scope="col" style="width: 50px;">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">No Kartu</th>
                                <th scope="col">No Kontak</th>
                                <th scope="col" style="width: 120px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pasien as $key=>$item)
                            <tr>
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="fw-semibold">{{ $item->nama }}</td>
                                <td>
                                    <small class="text-muted">
                                        {{ $item->alamat }},
                                        {{ $item->village->nama }},
                                        Kec. {{ $item->district->nama }},
                                        {{ $item->city->nama }},
                                        {{ $item->province->nama }}
                                    </small>
                                </td>
                                <td class="text-center">{{ $item->no_kartu }}</td>
                                <td class="text-center">{{ $item->telepon_mobile }}</td>
                                <td class="text-center">
                                    <a href="{{ route('patient.edit', ['id' => $item->id]) }}"
                                        class="btn btn-sm btn-outline-primary me-1">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox"></i> Data tidak tersedia
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection