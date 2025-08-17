@extends('layouts.app')
@section('title', 'Position')
@section('content')
<div class="mt-2">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-briefcase-fill"></i> Halaman Jabatan</h5>
            <div class="d-flex gap-2">
                <input type="text" id="searchInput" class="form-control form-control-sm" placeholder="Cari jabatan...">
                <button type="button" class="btn btn-light btn-sm text-primary" data-bs-toggle="modal"
                    data-bs-target="#newPosition">
                    <i class="bi bi-plus-circle"></i> Tambah
                </button>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 525px; overflow-y: auto;">
                <table class="table table-hover table-bordered align-middle mb-0" id="jabatanTable">
                    <thead class="table-primary text-center">
                        <tr>
                            <th>No</th>
                            <th>Jabatan</th>
                            <th>Waktu Pembuatan</th>
                            <th style="width:120px;">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jabatan as $key=>$position)
                        <tr>
                            <td class="text-center">{{ $key+1 }}</td>
                            <td class="fw-semibold">{{ $position->position }}</td>
                            <td class="text-center">{{ $position->created_at->format('d-m-Y H:i') }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-outline-info me-1" data-bs-toggle="modal"
                                    data-bs-target="#editPosition"
                                    onclick="parse(['{{ $position->id }}', '{{ $position->position }}'])">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger" disabled>
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Jabatan -->
    <div class="modal fade" id="newPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title"><i class="bi bi-plus-circle"></i> Tambah Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('position.add') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <label class="form-label">Jabatan <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" name="jabatan" required>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send-check-fill"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Jabatan -->
    <div class="modal fade" id="editPosition" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Ubah Jabatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ Route('position.edit') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="form-control" id="idJabatan" name="id">
                        <label class="form-label">Jabatan <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="jabatanEdit" name="jabatan" required>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-send-check-fill"></i>
                            Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

{{-- Script pencarian sederhana --}}
<script>
    document.getElementById("searchInput").addEventListener("keyup", function() {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#jabatanTable tbody tr");
        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? "" : "none";
        });
    });

    function parse(data){
        document.getElementById("idJabatan").value = data[0];            
        document.getElementById("jabatanEdit").value = data[1];            
    }
</script>

@endsection