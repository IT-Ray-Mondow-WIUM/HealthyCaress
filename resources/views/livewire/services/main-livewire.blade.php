<div>
    <style>
        .nav-tabs .nav-link.active {
            background-color: #0d6efd;
            /* Bootstrap primary */
            color: #fff;
            border-radius: 5px;
        }

        .nav-tabs .nav-link:hover {
            background-color: #0d6efd;
            /* Bootstrap primary */
            color: #fff;
        }

        .list-group {
            z-index: 1050;
            position: absolute;
            bottom: 100%;
            /* tampil di atas input */
            /* left: 0;
            right: 0; */
            background-color: #fff;
            width: 100%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            max-height: 225px;
            /* biar ga kepanjangan */
            overflow-y: auto;
        }
    </style>

    <h2 class="mb-2">Poli Umum</h2>

    <div class="container-fluid mt-3">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'datapribadi' ? 'active' : '' }}" href="#"
                    wire:click.prevent="setTab('datapribadi')">
                    Data Pribadi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'pemeriksaan' ? 'active' : '' }}" href="#"
                    wire:click.prevent="setTab('pemeriksaan')">
                    Pemeriksaan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'diagnosa' ? 'active' : '' }}" href="#"
                    wire:click.prevent="setTab('diagnosa')">
                    Diagnosa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'tindakan' ? 'active' : '' }}" href="#"
                    wire:click.prevent="setTab('tindakan')">
                    Tindakkan
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'resep' ? 'active' : '' }}" href="#"
                    wire:click.prevent="setTab('resep')">
                    BHP & Resep
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $activeTab === 'detail' ? 'active' : '' }}" href="#"
                    wire:click.prevent="setTab('detail')">
                    Detail
                </a>
            </li>
        </ul>


        <!-- Tab panes -->
        <div class="tab-content">
            <div class="">
                <livewire:services.datapasien :id="$registration->id" />
                @if ($activeTab === 'pemeriksaan') {{-- PEMERIKSAAN --}}
                <div class="tab-pane"><br>
                    <div class="card shadow rounded-2 overflow-hidden border border-primary border-1">
                        <div class="card-header bg-primary text-white fw-semibold p-2 mb-1 ">#Pemeriksaan Pasien
                        </div>
                        {{-- Baris 1 --}}
                        <div class="row mb-3 px-2">
                            {{-- Tekanan Darah --}}
                            <div class="col-md-6">
                                <label for="sistole" class="form-label fw-bold">Tekanan Darah <small><i>(sistole,
                                            diastole)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="sistole" id="sistole" class="form-control"
                                        placeholder="Sistole">
                                    <span class="input-group-text">mmHg</span>
                                    <input type="text" name="diastole" id="diastole" class="form-control"
                                        placeholder="Diastole">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>

                            {{-- Nafas --}}
                            <div class="col-md-6">
                                <label for="nafas" class="form-label fw-bold">Nafas
                                    <small><i>(x/menit)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="nafas" id="nafas" class="form-control"
                                        placeholder="Jumlah Nafas">
                                    <span class="input-group-text">x/menit</span>
                                </div>
                            </div>
                        </div>

                        {{-- Baris 2 --}}
                        <div class="row mb-3 px-2">
                            {{-- Nadi --}}
                            <div class="col-md-6">
                                <label for="nadi" class="form-label fw-bold">Nadi
                                    <small><i>(x/menit)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="nadi" id="nadi" class="form-control"
                                        placeholder="Denyut Nadi">
                                    <span class="input-group-text">x/menit</span>
                                </div>
                            </div>

                            {{-- Berat Badan --}}
                            <div class="col-md-6">
                                <label for="beratbadan" class="form-label fw-bold">Berat Badan
                                    <small><i>(Kg)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="beratbadan" id="beratbadan" class="form-control"
                                        placeholder="Berat Badan">
                                    <span class="input-group-text">Kg</span>
                                </div>
                            </div>
                        </div>

                        {{-- Baris 3 --}}
                        <div class="row mb-3 px-2">
                            {{-- Suhu --}}
                            <div class="col-md-6">
                                <label for="suhubadan" class="form-label fw-bold">Suhu
                                    <small><i>(&#8451;)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="suhubadan" id="suhubadan" class="form-control"
                                        placeholder="Suhu Tubuh">
                                    <span class="input-group-text">&#8451;</span>
                                </div>
                            </div>

                            {{-- Tinggi Badan --}}
                            <div class="col-md-6">
                                <label for="tinggibadan" class="form-label fw-bold">Tinggi Badan
                                    <small><i>(cm)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="tinggibadan" id="tinggibadan" class="form-control"
                                        placeholder="Tinggi Badan">
                                    <span class="input-group-text">cm</span>
                                </div>
                            </div>
                        </div>

                        {{-- Baris 4 --}}
                        <div class="row mb-3 px-2">
                            {{-- Gula Darah --}}
                            <div class="col-md-4">
                                <label for="guladarah" class="form-label fw-bold">Gula Darah
                                    <small><i>(mg/dl)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="guladarah" id="guladarah" class="form-control"
                                        placeholder="Gula Darah">
                                    <span class="input-group-text">mg/dl</span>
                                </div>
                            </div>

                            {{-- Asam Urat --}}
                            <div class="col-md-4">
                                <label for="asamurat" class="form-label fw-bold">Asam Urat
                                    <small><i>(mg/dl)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="asamurat" id="asamurat" class="form-control"
                                        placeholder="Asam Urat">
                                    <span class="input-group-text">mg/dl</span>
                                </div>
                            </div>

                            {{-- Kolesterol --}}
                            <div class="col-md-4">
                                <label for="kolesterol" class="form-label fw-bold">Kolesterol
                                    <small><i>(mg/dl)</i></small></label>
                                <div class="input-group mb-2">
                                    <input type="text" name="kolesterol" id="kolesterol" class="form-control"
                                        placeholder="Kolesterol">
                                    <span class="input-group-text">mg/dl</span>
                                </div>
                            </div>
                        </div>

                        {{-- Baris 5 --}}
                        <div class="row mb-3 px-2">
                            {{-- Alergi --}}
                            <div class="col-md-6">
                                <label for="alergi" class="form-label fw-bold">Alergi:</label>
                                <div class="input-group mb-2">
                                    <textarea name="alergi" id="alergi" rows="3" class="form-control"
                                        placeholder="Tulis jenis alergi jika ada"></textarea>
                                </div>
                            </div>

                            {{-- Keluhan Utama --}}
                            <div class="col-md-6">
                                <label for="keluhanutama" class="form-label fw-bold">Keluhan Utama:</label>
                                <div class="input-group mb-2">
                                    <textarea name="keluhanutama" id="keluhanutama" rows="3" class="form-control"
                                        placeholder="Keluhan utama pasien"></textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Baris 6 --}}
                        <div class="row mb-3 px-2">
                            {{-- Anamnesis --}}
                            <div class="col-md-6">
                                <label for="anamnesis" class="form-label fw-bold">Anamnesis Dokter:</label>
                                <div class="input-group mb-2">
                                    <textarea name="anamnesis" id="anamnesis" rows="3" class="form-control"
                                        placeholder="Catatan anamnesis"></textarea>
                                </div>
                            </div>

                            {{-- Pemeriksaan Fisik --}}
                            <div class="col-md-6">
                                <label for="pemeriksaanfisik" class="form-label fw-bold">Pemeriksaan
                                    Fisik:</label>
                                <div class="input-group mb-2">
                                    <textarea name="pemeriksaanfisik" id="pemeriksaanfisik" rows="3"
                                        class="form-control" placeholder="Catatan hasil pemeriksaan fisik"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($activeTab === 'diagnosa')
                {{-- DIAGNOSA --}}
                <div class="tab-pane"><br>
                    <div class="card shadow rounded-2 overflow-visible border border-primary border-1">
                        <div class="card-header bg-primary text-white fw-semibold p-2">
                            #Diagnosa Pasien
                        </div>
                        <div class="card-body">
                            {{-- Form Input ICD X & Jenis Kasus --}}
                            <div class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <label for="icd_x" class="form-label">ICD X</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model.live="searchicdx"
                                            placeholder="Cari ICD X..." />

                                        @if (!empty($icdx))
                                        <ul class="list-group mt-1">
                                            @foreach ($icdx as $list)
                                            <li class="list-group-item list-group-item-action bg-secondary text-light"
                                                wire:click="selectIcdx({{ $list->id }})">
                                                {{ $list->no_dtd }} - {{ $list->nama }}
                                                ({{ $list->kode }})
                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="jenis_kasus" class="form-label">Jenis Kasus</label>
                                    <select id="jenis_kasus" name="jenis_kasus" class="form-select"
                                        wire:model="jenisKasus" required>
                                        <option value="" disabled selected>== Pilih Jenis Kasus ==</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Lama">Lama</option>
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success w-100" wire:click="addIcdx()">
                                        <i class="bi bi-plus-circle"></i> Tambah Diagnosa
                                    </button>
                                </div>
                            </div>

                            {{-- Tabel Diagnosa --}}
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-striped align-middle table-bordered">
                                    <thead class="table-primary">
                                        <tr class="text-center">
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 15%;">ICD X</th>
                                            <th style="width: 55%;">Keterangan</th>
                                            <th style="width: 15%;">Kasus</th>
                                            <th style="width: 10%;">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($icdxList as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item['kode'] }}</td>
                                            <td>{{ $item['nama'] }}</td>
                                            <td>{{ $item['jenis_kasus'] }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="removeIcdx({{ $index }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted">Belum ada data
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                @elseif($activeTab === 'tindakan')
                {{-- Tindakan --}}
                <div class="tab-pane"><br>
                    <div class="card shadow rounded-2 overflow-visible border border-primary border-1">
                        <div class="card-header bg-primary text-white fw-semibold p-2">
                            #Tindakan
                        </div>
                        <div class="card-body">
                            {{-- Form Input ICD X & Jenis Kasus --}}
                            <div class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <label for="list_tindakan" class="form-label">Tindakan</label>
                                    <select id="list_tindakan" name="list_tindakan" class="form-select"
                                        wire:model="tindakan" required>
                                        <option value="" selected>== Pilih Tindakan ==</option>
                                        @foreach ($list_tindakan as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} -
                                            {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="jumlah_tindakan" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" placeholder="Jumlah ..."
                                        id="jumlah_tindakan" wire:model="jumlah_tindakan" />
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success w-100" wire:click="addTindakan()">
                                        <i class="bi bi-plus-circle"></i> Tambah Tindakan
                                    </button>
                                </div>
                            </div>

                            {{-- Tabel Diagnosa --}}
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-striped align-middle table-bordered">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 15%;">Operator</th>
                                            <th style="width: 40%;">Tindakan</th>
                                            <th style="width: 15%;">Jumlah</th>
                                            <th style="width: 15%;">Tarif</th>
                                            <th style="width: 10%;">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tindakanTerpilih as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['dokter'] }}</td>
                                            <td>{{ $item['tindakan'] }}</td>
                                            <td class="text-end">{{ $item['jumlah'] }}</td>
                                            <td class="text-end">{{ number_format($item['tarif'], 2) }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="removeTindakan({{ $key }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="6">Belum Ada Tindakan</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                @elseif($activeTab === 'resep')
                {{-- Resep --}}
                <div class="tab-pane"><br>
                    <div class="card shadow rounded-2 overflow-visible border border-primary border-1">
                        <div class="card-header bg-primary text-white fw-semibold p-2">
                            #BHP
                        </div>
                        <div class="card-body">
                            {{-- Form Input ICD X & Jenis Kasus --}}
                            <div class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <label for="list_bhp" class="form-label">BHP</label>
                                    <select id="list_bhp" name="list_bhp" class="form-select" wire:model="bhp" required>
                                        <option value="" selected>== Pilih BHP ==</option>
                                        @foreach ($list_bhp as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="jumlah_bhp" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" placeholder="Jumlah ..." id="jumlah_bhp"
                                        wire:model="jumlah_bhp" />
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success w-100" wire:click="addBhp()">
                                        <i class="bi bi-plus-circle"></i> Tambah BHP
                                    </button>
                                </div>
                            </div>

                            {{-- Tabel BHP --}}
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-striped align-middle table-bordered">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 30%;">Nama</th>
                                            <th style="width: 15%;">Jumlah</th>
                                            <th style="width: 15%;">Tarif</th>
                                            <th style="width: 20%;">Total</th>
                                            <th style="width: 15%;">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bhpTerpilih as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['bhp'] }}</td>
                                            <td class="text-end">{{ $item['jumlah'] }}</td>
                                            <td class="text-end">{{ number_format($item['tarif'], 2) }}</td>
                                            <td class="text-end">
                                                {{ number_format($item['tarif'] * $item['jumlah'], 2) }}
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="removeBhp({{ $key }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="6">Tidak Ada BHP</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="card shadow rounded-2 overflow-visible border border-primary border-1 mt-3">
                        <div class="card-header bg-primary text-white fw-semibold p-2">
                            #Resep
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-end">
                                <div class="col-md-4">
                                    <label for="list_resep" class="form-label">Resep</label>
                                    <select id="list_resep" name="list_resep" class="form-select" wire:model="resep"
                                        required>
                                        <option value="" selected>== Pilih Obat ==</option>
                                        @foreach ($list_resep as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="jumlah_resep" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" placeholder="Jumlah ..." id="jumlah_resep"
                                        wire:model="jumlah_resep" />
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-success w-100" wire:click="addRecipe()">
                                        <i class="bi bi-plus-circle"></i> Tambah Obat
                                    </button>
                                </div>
                            </div>

                            {{-- Tabel Resep --}}
                            <div class="table-responsive mt-4">
                                <table class="table table-hover table-striped align-middle table-bordered">
                                    <thead class="table-primary text-center">
                                        <tr>
                                            <th style="width: 5%;">No</th>
                                            <th style="width: 30%;">Nama</th>
                                            <th style="width: 15%;">Jumlah</th>
                                            <th style="width: 15%;">Tarif</th>
                                            <th style="width: 20%;">Total</th>
                                            <th style="width: 15%;">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($resepTerpilih as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item['resep'] }}</td>
                                            <td class="text-end">{{ $item['jumlah'] }}</td>
                                            <td class="text-end">{{ number_format($item['tarif'], 2) }}</td>
                                            <td class="text-end">
                                                {{ number_format($item['tarif'] * $item['jumlah'], 2) }}
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-danger"
                                                    wire:click="removeRecipe({{ $key }})">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="6" class="text-muted">Tidak Ada Resep</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif($activeTab === 'detail')
                {{-- Detail --}}
                <div class="tab-pane"><br>
                    <div class="card shadow rounded-2 overflow-visible border border-primary border-1">
                        <div class="card-header bg-primary text-white fw-semibold p-2">
                            #Detail
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle">
                                    <thead class="table-primary">
                                        <tr>
                                            <th colspan="4" class="text-center fs-5 fw-bold"># Pemeriksaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="w-25">Tekanan Darah (sistole, diastole)</th>
                                            <td class="w-25">.../...</td>
                                            <th class="w-25">Nafas (x/menit)</th>
                                            <td class="w-25">...</td>
                                        </tr>
                                        <tr>
                                            <th>Nadi (x/menit)</th>
                                            <td>...</td>
                                            <th>Berat Badan (Kg)</th>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <th>Suhu (&#8451;)</th>
                                            <td>...</td>
                                            <th>Tinggi Badan (cm)</th>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <th>Gula Darah (mg/dl)</th>
                                            <td>...</td>
                                            <th>Asam Urat (mg/dl)</th>
                                            <td>...</td>
                                        </tr>
                                        <tr>
                                            <th>Kolesterol (mg/dl)</th>
                                            <td colspan="2">...</td>
                                            <td rowspan="5" class="text-center align-middle">TTD</td>
                                        </tr>
                                        <tr>
                                            <th>Alergi</th>
                                            <td colspan="2">...</td>
                                        </tr>
                                        <tr>
                                            <th>Keluhan Utama</th>
                                            <td colspan="2">...</td>
                                        </tr>
                                        <tr>
                                            <th>Anamnesis Dokter</th>
                                            <td colspan="2">...</td>
                                        </tr>
                                        <tr>
                                            <th>Pemeriksaan Fisik</th>
                                            <td colspan="2">...</td>
                                        </tr>
                                    </tbody>

                                    <thead class="table-primary">
                                        <tr>
                                            <th colspan="4" class="text-center fs-5 fw-bold"># Diagnosa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <th class="col bg-secondary text-light">ICD X</th>
                                            <th colspan="2" class="col bg-secondary text-light">Keterangan</th>
                                            <th class="col bg-secondary text-light">Kasus</th>
                                        </tr>
                                        @forelse($icdxList as $index => $item)
                                        <tr>
                                            <td>{{ $item['kode'] }}</td>
                                            <td colspan="2">{{ $item['nama'] }}</td>
                                            <td>{{ $item['jenis_kasus'] }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Belum ada data
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>

                                    <thead class="table-primary">
                                        <tr>
                                            <th colspan="4" class="text-center fs-5 fw-bold"># Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <th class="col bg-secondary text-light">Tindakan</th>
                                            <th class="col bg-secondary text-light">Jumlah</th>
                                            <th class="col bg-secondary text-light">Tarif</th>
                                            <th class="col bg-secondary text-light">Total</th>
                                        </tr>
                                        @forelse ($tindakanTerpilih as $key=>$item)
                                        <tr>
                                            <td>{{ $item['tindakan'] }}</td>
                                            <td class="text-end">{{ $item['jumlah'] }}</td>
                                            <td class="text-end">{{ number_format($item['tarif'], 2) }}</td>
                                            <td class="text-end">
                                                {{ number_format($item['tarif'] * $item['jumlah'], 2) }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="6" class="text-muted">Belum Ada Tindakan</td>
                                        </tr>
                                        @endforelse
                                    </tbody>

                                    <thead class="table-primary">
                                        <tr>
                                            <th colspan="4" class="text-center fs-5 fw-bold"># BHP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <th class="col bg-secondary text-light">Nama</th>
                                            <th class="col bg-secondary text-light">Jumlah</th>
                                            <th class="col bg-secondary text-light">Tarif</th>
                                            <th class="col bg-secondary text-light">Total</th>
                                        </tr>
                                        @forelse ($bhpTerpilih as $key=>$item)
                                        <tr>
                                            <td>{{ $item['bhp'] }}</td>
                                            <td class="text-end">{{ $item['jumlah'] }}</td>
                                            <td class="text-end">{{ number_format($item['tarif'], 2) }}</td>
                                            <td class="text-end">
                                                {{ number_format($item['tarif'] * $item['jumlah'], 2) }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="6" class="text-muted">Tidak Ada BHP</td>
                                        </tr>
                                        @endforelse
                                    </tbody>

                                    <thead class="table-primary">
                                        <tr>
                                            <th colspan="4" class="text-center fs-5 fw-bold"># Resep</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <th class="col bg-secondary text-light">Nama</th>
                                            <th class="col bg-secondary text-light">Jumlah</th>
                                            <th class="col bg-secondary text-light">Tarif</th>
                                            <th class="col bg-secondary text-light">Total</th>
                                        </tr>
                                        @forelse ($resepTerpilih as $key=>$item)
                                        <tr>
                                            <td>{{ $item['resep'] }}</td>
                                            <td class="text-end">{{ $item['jumlah'] }}</td>
                                            <td class="text-end">{{ number_format($item['tarif'], 2) }}</td>
                                            <td class="text-end">
                                                {{ number_format($item['tarif'] * $item['jumlah'], 2) }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="text-center">
                                            <td colspan="6" class="text-muted">Tidak Ada Resep</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                {{-- DATA PRIBADI --}}
                <div class="tab-pane"><br>
                    <div class="card shadow rounded-4 overflow-hidden py-2 mt-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <h5>== Detail Pasien ==</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-3">Alamat</td>
                                            <td>:</td>
                                            <td>{{ $patient['alamat'] }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <small>
                                                    {{ $registration->patient->village->nama }},
                                                    Kec. {{ $registration->patient->district->nama }},
                                                    {{ $registration->patient->city->nama }},
                                                    {{ $registration->patient->province->nama }}
                                                </small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td>{{ $registration->patient->job->nama }}</td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <h5>== Layanan Pendaftaran ==</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Poliklinik</td>
                                            <td>:</td>
                                            <td>{{ ucfirst($registration->clinic->name) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Dokter</td>
                                            <td>:</td>
                                            <td>{{ $registration->doctor->employee->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>IHS</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text"
                                                    class="form-control form-control-sm d-inline-block w-auto"
                                                    value="{{ $patient['ihs'] }}" disabled>
                                                <i class="bi bi-check2-all text-primary"></i>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>BPJS</td>
                                            <td>:</td>
                                            <td>
                                                <input type="text"
                                                    class="form-control form-control-sm d-inline-block w-auto" value=""
                                                    disabled>
                                                <i class="bi bi-check2-all text-primary"></i>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="3" class="text-center">
                                                <h5>== Dokumen Cetak ==</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <a href="#"><i class="bi bi-printer-fill"></i> Cetak Lembar
                                                    RM</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <a href="#"><i class="bi bi-printer-fill"></i> Cetak Surat
                                                    Rujukan</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <a href="#"><i class="bi bi-printer-fill"></i> Cetak Surat
                                                    Keterangan
                                                    Sakit</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>