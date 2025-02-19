<div>
    <!-- Progress Bar -->
    <div class="progress mb-3 text-center" style="height: 15px;">
        <div class="progress-bar" role="progressbar" style="width: {{ ($steps / 2) * 100 }}%;"
            aria-valuenow="{{ $steps }}" aria-valuemin="1" aria-valuemax="2">{{ $steps }}/ 2</div>
    </div>

    <div class="card p-4">
        <!-- Konten Berdasarkan Step -->
        @if ($steps == 2)
        <table class="table table-striped table-sm">
            <thead class="table-secondary">
                <tr>
                    <td><b>Registration</b> >> <b>Service</b></td>
                </tr>
            </thead>
        </table>

        <livewire:Registration.ServicePatientForm />

        <div class="text-end">
            <button type="button" class="btn btn-danger btn-sm" wire:click="kembali">
                <i class="bi bi-arrow-left-circle"></i> Back</button>
            <button type="button" @if (!$selectedClinicId || !$selectedDoctorId) disabled @endif
                class="btn btn-primary btn-sm" wire:click="submit">Submit <i class="bi bi-check-circle"></i></button>
        </div>
        @else

        <livewire:Registration.SearchPatient :selectedOldPatient="$selectedOldPatient" />

        <div class="text-end mt-4">
            <button type="button" class="btn btn-sm btn-info" wire:click='savedData'>Next
                <i class="bi bi-arrow-right-circle"></i></button>
        </div>
        @endif
    </div>
</div>