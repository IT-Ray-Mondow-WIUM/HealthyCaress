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
                        <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal"
                            data-bs-target="#editPosition"
                            onclick="parse(['{{ $position->id }}', '{{ $position->position }}'])">
                            <i class="bi bi-pencil-fill"></i>
                        </button>
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
                class="bi bi-plus-circle"></i> Tambah</button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-circle"></i> Tambah
                        Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('position.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3 align-items-center">
                            <label for="nik" class="col-form-label">Jabatan<sup class="text-danger">*</sup></label>
                            <div class="col">
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="editPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><i class="bi bi-plus-circle"></i> Ubah
                        Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('position.edit') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3 align-items-center">
                            <label for="nik" class="col-form-label">Jabatan<sup class="text-danger">*</sup></label>
                            <div class="col">
                                <input type="text" class="form-control" id="idJabatan" name="id" readonly hidden>
                                <input type="text" class="form-control" id="jabatanEdit" name="jabatan" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function parse(data){
            document.getElementById("idJabatan").value = data[0];            
            document.getElementById("jabatanEdit").value = data[1];            
        }
    </script>
</div>
@endsection