<div class="container-fluid mt-4">
    <p>{{ $formData['name'] }}</p>
    <!-- Progress Bar -->
    <div class="progress mb-3" style="height: 10px;">
        <div class="progress-bar" role="progressbar" style="width: {{ ($steps / 3) * 100 }}%;"
            aria-valuenow="{{ $steps }}" aria-valuemin="1" aria-valuemax="3"></div>
    </div>

    <!-- Konten Berdasarkan Step -->
    @if ($steps == 1)
    <form wire:submit='savedData'>
        <table class="table table-borderless table-lg table-responsive">
            <thead class="table-secondary">
                <tr class="border border-bottom">
                    <th colspan="2"><i class="bi bi-person-lines-fill"></i> Biodata Pasien</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="inputName" class="form-label">Nama Pasien</label>
                    </td>
                    <td>
                        <input type="text" class="form-control bg-light border-dark" placeholder="Name" id="inputName"
                            wire:model="formData.name" required>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">Jenis Kelamin</td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin1"
                                value="l" checked>
                            <label class="form-check-label" for="jenisKelamin1">Laki-Laki</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin2"
                                value="p">
                            <label class="form-check-label" for="jenisKelamin2">Perempuan</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="inputPlaceBirth" class="form-label">Tempat Lahir</label>
                    </td>
                    <td>
                        <input type="text" class="form-control bg-light border-dark" placeholder="Tempat Lahir"
                            id="inputPlaceBirth">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="inputDateBirth" class="form-label">Tanggal Lahir</label>
                    </td>
                    <td>
                        <input type="date" class="form-control bg-light border-dark" id="inputDateBirth"
                            style="width: 200px">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">Status Pernikahan</td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusPernikahan" id="statusPernikahan1"
                                value="l" checked>
                            <label class="form-check-label" for="statusPernikahan1">Belum Menikah</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="statusPernikahan" id="statusPernikahan2"
                                value="p">
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
                    <label class="me-3" style="width: 155px;">Kewarganegaraan</label>
                    <div class="d-flex">
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="kewarganegaraan" id="wni" value="WNI"
                                checked>
                            <label class="form-check-label" for="wni">WNI</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kewarganegaraan" id="wna" value="WNA">
                            <label class="form-check-label" for="wna">WNA</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex align-items-center my-1">
                    <label for="inputIdK" class="me-3" style="width: 225px;">ID Kependudukan</label>
                    <input type="text" class="form-control bg-light border-dark" placeholder="Masukkan ID"
                        id="inputIdK">
                </div>
            </div>

            <!-- Provinsi & Kecamatan -->
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="provinsi" class="me-3" style="width: 225px;">Provinsi</label>
                    <select class="form-select" id="provinsi">
                        <option disabled selected>== Pilih Provinsi ==</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <label for="kecamatan" class="me-3" style="width: 225px;">Kecamatan</label>
                    <select class="form-select" id="kecamatan">
                        <option disabled selected>== Pilih Kecamatan ==</option>
                    </select>
                </div>
            </div>

            <!-- Kota & Desa -->
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="kota" class="me-3" style="width: 225px;">Kota</label>
                    <select class="form-select" id="kota">
                        <option disabled selected>== Pilih Kota ==</option>
                    </select>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <label for="desa" class="me-3" style="width: 225px;">Desa</label>
                    <select class="form-select" id="desa">
                        <option disabled selected>== Pilih Desa ==</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="rtrw" class="me-3" style="width: 155px;">RT/RW</label>
                    <input type="text" class="form-control bg-light border-dark me-2" id="rtrw" style="width: 50px">
                    <small> / </small>
                    <input type="text" class="form-control bg-light border-dark ms-2" id="rtrw" style="width: 50px">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center my-1">
                    <label for="detailAlamat" class="me-3" style="width: 225px;">Detail Alamat</label>
                    <input type="text" class="form-control bg-light border-dark" placeholder="Detail Alamat"
                        id="detailAlamat">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="agamaPasien" class="me-3" style="width: 225px;">Agama</label>
                    <select class="form-select" id="agamaPasien">
                        <option disabled selected>== Pilih Agama ==</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <label for="pekerjaanPasien" class="me-3" style="width: 225px;">Pekerjaan</label>
                    <select class="form-select" id="pekerjaanPasien">
                        <option disabled selected>== Pilih Pekerjaan ==</option>
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
                        <input type="text" class="form-control bg-light border-dark" placeholder="Nomor Pasien Lama"
                            id="noPasien">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="namaPenanggung" class="form-label">Nama Penanggung</label>
                    </td>
                    <td>
                        <input type="text" class="form-control bg-light border-dark" placeholder="Nomor Pasien Lama"
                            id="namaPenanggung">
                    </td>
                    <td class="w-25 align-middle">
                        <label for="hubungan" class="form-label">Hubungan</label>
                    </td>
                    <td>
                        <select class="form-select" id="hubungan">
                            <option disabled selected>== Pilih Hubungan ==</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="telpPenanggung" class="form-label">Telepon Penanggung</label>
                    </td>
                    <td colspan="3">
                        <input type="text" class="form-control bg-light border-dark"
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
                        <input type="text" class="form-control bg-light border-dark"
                            placeholder="Nomor Telephone Pasien" id="noTelpPasien">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="noHpPasien" class="form-label">No Handphone Pasien</label>
                    </td>
                    <td>
                        <input type="text" class="form-control bg-light border-dark"
                            placeholder="Nomor Handphone Pasien" id="noHpPasien">
                    </td>
                </tr>
                <tr>
                    <td class="w-25 align-middle">
                        <label for="emailPasien" class="form-label">Alaman E-mail Pasien</label>
                    </td>
                    <td>
                        <input type="text" class="form-control bg-light border-dark" placeholder="Alamat E-mail Pasien"
                            id="emailPasien">
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
        <button type="button" class="btn btn-info" wire:click="steps2">Lanjut <i class="bi bi-arrow-right"></i></button>
    </div>
    @else
    <h5 class="text-center">Step 3: Tindakan</h5>
    <p>Silakan pilih tindakan medis.</p>
    <div class="text-end">
        <button type="button" class="btn btn-danger" wire:click="kembali"><i class="bi bi-arrow-left"></i>
            Kembali</button>
        <button type="button" class="btn btn-primary">Selesai <i class="bi bi-check-circle"></i></button>
    </div>
    @endif
</div>