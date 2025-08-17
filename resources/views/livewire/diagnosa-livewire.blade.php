<div>
    <style>
        .small.text-muted {
            display: none !important;
        }
    </style>

    <div class="container-fluid p-2">
        <div class="row mb-3 align-items-center">
            {{-- Kotak cari di kiri --}}
            <div class="col-md-4">
                <input type="text" wire:model.live="search" class="form-control" placeholder="Cari diagnosa...">
            </div>

            {{-- Tombol tambah di kanan --}}
            <div class="col-md-8 d-flex justify-content-end mt-1">
                <button class="btn btn-success btn-sm">
                    <i class="bi bi-plus-circle-fill"></i> Tambah Diagnosa
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle table-sm table-striped">
                <thead class="table-primary text-center">
                    <tr>
                        <th style="width: 77px;">
                            <select wire:model.live="perPage" class="form-select">
                                <option value="5">5</option>
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                {{-- <option value="100">100 data</option> --}}
                            </select>
                        </th>
                        <th style="width: 150px;">Kode</th>
                        <th>Nama Diagnosa</th>
                        <th style="width: 70px;">#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($diagnosas as $item)
                    <tr>
                        <td class="text-center">
                            {{ $diagnosas->firstItem() + $loop->index }}
                        </td>
                        <td class="text-center">{{ $item->kode }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-danger"> <i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted"> Tidak ada data ditemukan</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center" style="font-weight: bolder">
        <div>
            Menampilkan {{ $diagnosas->firstItem() }} - {{ $diagnosas->lastItem() }}
            dari {{ $diagnosas->total() }} data
        </div>
        <div class="mt-2">
            {{ $diagnosas->links() }}
        </div>
    </div>
</div>