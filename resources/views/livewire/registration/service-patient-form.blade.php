<div class="py-2">
    <div class="row g-3">
        <!-- Poliklinik -->
        <div class="col-md-6 d-flex align-items-center">
            <label for="poli" class="me-3" style="width: 150px;">Poliklinik<sup class="text-danger">*</sup></label>
            <select class="form-select" id="poli" wire:model.change='selectedClinicId'>
                <option value="">== Pilih Poliklinik ==</option>
                @foreach ($clinic_list as $clinic)
                <option value="{{ $clinic['id'] }}">{{ $clinic['id'] }} / {{ strToUpper($clinic['name']) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dokter -->
        <div class="col-md-6 d-flex align-items-center">
            <label for="dokter" class="me-3" style="width: 150px;">Dokter<sup class="text-danger">*</sup></label>
            <select class="form-select" id="dokter" wire:model="selectedDoctorId" wire:change="services">
                <option value="">== Pilih Dokter ==</option>
                @foreach ($doctor_list as $doctor)
                <option value="{{ $doctor->id }}">{{ $doctor->employee->nama }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- <div>
        <button type="button" class="btn btn-sm btn-warning"><i class="bi bi-eye-fill"
                wire:click='services'></i></button>
    </div> --}}
</div>