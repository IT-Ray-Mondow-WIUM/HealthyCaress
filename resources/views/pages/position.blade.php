@extends('layouts.app')
@section('title', 'Position')
@section('content')
<div class="mt-2">
    <h4>Halaman Jabatan</h4>

    <div class="container-fluid border border-primary py-1 table-responsive" style="height: 525px;">
        <table class="table table-striped table-bordered table-sm">
            <thead class="text-center">
                <tr>
                    <th>No</th>
                    <th>Jabatan</th>
                    <th>Waktu Pembuatan</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jabatan as $key=>$position)
                <tr>
                    <td>{{ ($position->id) - 1 }}</td>
                    <td>{{ $position->position }}</td>
                    <td>{{ $position->created_at }}</td>
                    <td style="white-space: nowrap;" class="text-center">
                        <a href="#" class="btn btn-sm btn-info">
                            <i class="bi bi-pencil-fill"></i>
                        </a>
                        <button type="button" class="btn btn-sm btn-danger text-light" disabled>
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="container-fluid mt-1 text-end">
        <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#newPosition"><i
                class="bi bi-person-plus-fill"></i></button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-person-plus-fill"></i> Tambah
                        Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection