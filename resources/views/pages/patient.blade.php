@extends('layouts.app')
@section('title', 'Patient')
@section('content')
<div class="mt-2">
    <h4>Halaman Pasien</h4>

    <div class="container-fluid">
        <div class="table-responsive border border-primary p-1" style="height: 525px;">
            <table class="table table-bordered table-striped table-hover table-sm">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col" style="white-space: nowrap;">No Kartu</th>
                        <th scope="col">No Kontak</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pasien as $key=>$item)
                    <tr>
                        <td>{{ $key+1 }}.</td>
                        <td style="white-space: nowrap;">{{ $item->nama }}</td>
                        <td>
                            <small style="white-space: nowrap;">{{ $item->alamat }}, {{ $item->village->nama }}, Kec.{{
                                $item->district->nama }}, {{
                                $item->city->nama }}, {{ $item->province->nama }}</small>
                        </td>
                        <td>{{ $item->no_kartu }}</td>
                        <td>{{ $item->telepon_mobile }}</td>
                        <td style="white-space: nowrap;">
                            <button type="button" class="btn btn-sm btn-info"><i class="bi bi-pencil-fill"></i></button>
                            <button type="button" class="btn btn-sm btn-danger text-light"><i
                                    class="bi bi-trash-fill"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Data tidak tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection