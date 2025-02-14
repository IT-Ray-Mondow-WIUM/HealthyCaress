<div class="container-fluid mt-4">
    {{-- <p>{{ $formData['provinsi'] }}</p> --}}
    <!-- Progress Bar -->
    <div class="progress mb-3 text-center" style="height: 15px;">
        <div class="progress-bar" role="progressbar" style="width: {{ ($steps / 3) * 100 }}%;"
            aria-valuenow="{{ $steps }}" aria-valuemin="1" aria-valuemax="3">{{ $steps }}/ 3</div>
    </div>

    <!-- Konten Berdasarkan Step -->
    @if ($steps == 1)
    <form wire:submit='savedData'>
        {{-- wire:submit='collectData' --}}
        <table class="table table-borderless table-lg table-responsive">
            <thead class="table-secondary">
                <tr class="border border-bottom">
                    <th colspan="2"><i class="bi bi-person-lines-fill"></i> Biodata Pasien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="inputName" class="form-label">Nama Pasien<sup class="text-danger">*</sup></label>
                    </td>
                    <td>
                        <input type="text" class="form-control bg-light border-dark" placeholder="Name" id="inputName"
                            wire:model="name" required>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">Jenis Kelamin<sup class="text-danger">*</sup></td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input wire:model='gender' class="form-check-input" type="radio" name="jenisKelamin"
                                id="jenisKelamin1" value="l">
                            <label class="form-check-label" for="jenisKelamin1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input wire:model='gender' class="form-check-input" type="radio" name="jenisKelamin"
                                id="jenisKelamin2" value="p">
                            <label class="form-check-label" for="jenisKelamin2">Perempuan</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="inputPlaceBirth" class="form-label">Tempat Lahir<sup
                                class="text-danger">*</sup></label>
                    </td>
                    <td>
                        <input wire:model='birthPlace' type="text" class="form-control bg-light border-dark"
                            placeholder="Tempat Lahir" id="inputPlaceBirth" required>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="inputDateBirth" class="form-label">Tanggal Lahir<sup
                                class="text-danger">*</sup></label>
                    </td>
                    <td>
                        <input wire:model='birthDate' type="date" class="form-control bg-light border-dark"
                            id="inputDateBirth" style="width: 200px" required>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">Status Pernikahan<sup class="text-danger">*</sup></td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input wire:model='maritalStatus' class="form-check-input" type="radio"
                                name="statusPernikahan" id="statusPernikahan1" value="0" checked>
                            <label class="form-check-label" for="statusPernikahan1">Belum Menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input wire:model='maritalStatus' class="form-check-input" type="radio"
                                name="statusPernikahan" id="statusPernikahan2" value="1">
                            <label class="form-check-label" for="statusPernikahan2">Sudah Menikah</label>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div>
            <h5 class="border-bottom pb-2"><i class="bi bi-journal-check"></i> Kependudukan</h5>
            <!-- Kewarganegaraan & ID Kependudukan -->
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label class="me-3" style="width: 155px;">Kewarganegaraan<sup class="text-danger">*</sup></label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input wire:model='citizenship' class="form-check-input" type="radio" name="kewarganegaraan"
                                id="wni" value="0" checked>
                            <label class="form-check-label" for="wni">WNI</label>
                        </div>
                        <div class="form-check">
                            <input wire:model='citizenship' class="form-check-input" type="radio" name="kewarganegaraan"
                                id="wna" value="1">
                            <label class="form-check-label" for="wna">WNA</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center my-1">
                    <label for="inputIdK" class="me-3" style="width: 225px;">ID Kependudukan<sup
                            class="text-danger">*</sup></label>
                    <input wire:model='identityNum' type="text" class="form-control bg-light border-dark"
                        placeholder="Masukkan ID" id="inputIdK" minlength="16" maxlength="16" required>
                </div>
            </div>

            <!-- Provinsi & Kecamatan -->
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="provinsi" class="me-3" style="width: 225px;">Provinsi<sup
                            class="text-danger">*</sup></label>
                    <select class="form-select" id="provinsi" wire:model.change='selectedProvince' wire:ignore required>
                        <option value="">== Pilih Provinsi ==</option>
                        @foreach ($province_list as $list)
                        <option value="{{ $list['kode'] }}">{{
                            $list['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <label for="kecamatan" class="me-3" style="width: 225px;">Kecamatan<sup
                            class="text-danger">*</sup></label>
                    <select class="form-select" id="kecamatan" wire:model.change='selectedDistrict' required>
                        <option value="">== Pilih Kecamatan ==</option>
                        @foreach ($district_list as $list)
                        <option value="{{ $list['kode'] }}">{{
                            $list['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Kota & Desa -->
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="kota" class="me-3" style="width: 225px;">Kota<sup class="text-danger">*</sup></label>
                    <select class="form-select" id="kota" wire:model.change='selectedCity' required>
                        <option value="">== Pilih Kota ==</option>
                        @foreach ($city_list as $list)
                        <option value="{{ $list['kode'] }}">{{
                            $list['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <label for="desa" class="me-3" style="width: 225px;">Desa<sup class="text-danger">*</sup></label>
                    <select class="form-select" id="desa" wire:model='selectedVillage' required>
                        <option value="">== Pilih Desa ==</option>
                        @foreach ($village_list as $list)
                        <option value="{{ $list['kode'] }}">{{
                            $list['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="rtrw" class="me-3" style="width: 155px;">RT / RW<sup class="text-danger">*</sup></label>
                    <input wire:model='rt' type="text" class="form-control bg-light border-dark me-2" id="rtrw"
                        style="width: 57px" required maxlength="3">
                    <small> / </small>
                    <input wire:model='rw' type="text" class="form-control bg-light border-dark ms-2" id="rtrw"
                        style="width: 57px" required maxlength="3">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center my-1">
                    <label for="detailAlamat" class="me-3" style="width: 225px;">Detail Alamat</label>
                    <input wire:model='detail' type="text" class="form-control bg-light border-dark"
                        placeholder="Detail Alamat" id="detailAlamat">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="agamaPasien" class="me-3" style="width: 225px;">Agama<sup
                            class="text-danger">*</sup></label>
                    <select wire:model='religions' class="form-select" id="agamaPasien" required>
                        <option value="">== Pilih Agama ==</option>
                        @foreach ($religions_list as $list)
                        <option value="{{ $list['id'] }}">{{
                            ucfirst($list['nama']) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="pekerjaanPasien" class="me-3" style="width: 225px;">Pekerjaan<sup
                            class="text-danger">*</sup></label>
                    <select wire:model='works' class="form-select" id="pekerjaanPasien" required>
                        <option value="">== Pilih Pekerjaan ==</option>
                        @foreach ($works_list as $list)
                        <option value="{{ $list['id'] }}">{{
                            $list['nama'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <table class="table table-borderless table-large table-responsive">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" colspan="4"><i class="bi bi-card-checklist"></i> Administrasi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="noPasien" class="form-label">No Pasien</label>
                    </td>
                    <td colspan="3">
                        <input wire:model='old_patient_num' type="text" class="form-control bg-light border-dark"
                            placeholder="Nomor Pasien Lama" id="noPasien">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="namaPenanggung" class="form-label">Nama Penanggung</label>
                    </td>
                    <td>
                        <input wire:model='nameFamily' type="text" class="form-control bg-light border-dark"
                            placeholder="Nama Penanggung" id="namaPenanggung">
                    </td>
                    <td class="w-25 align-middle">
                        <label for="hubungan" class="form-label">Hubungan</label>
                    </td>
                    <td>
                        <select wire:model='relation' class="form-select" id="hubungan">
                            <option value="">== Pilih Hubungan ==</option>
                            @foreach ($relations_list as $list)
                            <option value="{{ $list['id'] }}">{{
                                $list['hubungan'] }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="telpPenanggung" class="form-label">Telepon Penanggung</label>
                    </td>
                    <td colspan="3">
                        <input wire:model='phoneFamily' type="text" class="form-control bg-light border-dark"
                            placeholder="Nomor Telepon Penanggung" id="telpPenanggung">
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table table-borderless table-large table-responsive">
            <thead class="table-secondary">
                <tr>
                    <th scope="col" colspan="2"><i class="bi bi-telephone"></i> Kontak</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="noTelpPasien" class="form-label">No Telepon Pasien</label>
                    </td>
                    <td>
                        <input wire:model='patientPhone' type="text" class="form-control bg-light border-dark"
                            placeholder="Nomor Telephone Pasien" id="noTelpPasien">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="noHpPasien" class="form-label">No Handphone Pasien</label>
                    </td>
                    <td>
                        <input wire:model='patientHp' type="text" class="form-control bg-light border-dark"
                            placeholder="Nomor Handphone Pasien" id="noHpPasien">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="emailPasien" class="form-label">Alamat E-mail Pasien</label>
                    </td>
                    <td>
                        <input wire:model='patientMail' type="mail" class="form-control bg-light border-dark"
                            placeholder="Alamat E-mail Pasien" id="emailPasien">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <button type="submit" class="btn btn-md btn-info">Lanjut
                <i class="bi bi-arrow-right-square"></i>
            </button>
        </div>
    </form>
    @elseif ($steps == 2)
    <h5 class="text-center">Step 2: Upload Foto</h5>
    <p>Silakan unggah foto pasien.</p>
    <div class="text-end">
        <button type="button" class="btn btn-danger" wire:click="kembali"><i class="bi bi-arrow-left"></i>
            Kembali</button>
        <button type="button" class="btn btn-info" wire:click="savePhoto">Lanjut <i
                class="bi bi-arrow-right"></i></button>
    </div>
    @else
    <h5 class="text-center">Step 3: Tindakan</h5>
    <p>Silakan pilih tindakan medis.</p>
    <div class="text-end">
        <button type="button" class="btn btn-danger" wire:click="kembali"><i class="bi bi-arrow-left"></i>
            Kembali</button>
        <button type="button" class="btn btn-primary" wire:click="submit">Selesai <i
                class="bi bi-check-circle"></i></button>
    </div>
    @endif
</div>