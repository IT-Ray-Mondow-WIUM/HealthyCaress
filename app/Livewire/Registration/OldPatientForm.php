<?php

namespace App\Livewire\Registration;

use App\Models\Registration;
use Carbon\Carbon;
use Livewire\Component;
use PhpParser\Node\Expr\FuncCall;

class OldPatientForm extends Component
{
    public $selectedClinicId, $selectedDoctorId, $steps = 1;
    protected $listeners = ['oldPatient' => 'handleOldPatient', 'services' => 'handleServices'];
    public $selectedOldPatient;

    public function savedData()
    {
        $this->steps = $this->steps + 1;
    }
    public function kembali()
    {
        $this->selectedClinicId = null;
        $this->selectedDoctorId = null;
        $this->steps = $this->steps - 1;
    }
    public function submit()
    {
        $containData = [
            'clinic_id' => $this->selectedClinicId,
            'doctor_id' => $this->selectedDoctorId,
            'jenis_pendaftaran' => 'RawatJalan',
            'jenis_pasien' => 'Lama'
        ];
        $saveRegistration = $this->savedRegistration($this->selectedOldPatient, $containData);

        if ($saveRegistration) {
            session()->flash('success', 'Registrasi berhasil!');
            return redirect()->route('registration');
        } else {
            $info = [
                'status' => 'Gagal Menyimpan',
                'eror' => $saveRegistration
            ];
            dd($info);
            // $this->dispatchBrowserEvent('show-toast', ['type' => 'error', 'message' => 'Registrasi gagal disimpan!']);
        }

        // dd($containData);
    }

    public function handleOldPatient($oldPatient)
    {
        $this->selectedOldPatient = $oldPatient;
    }
    public function handleServices($services)
    {
        $this->selectedClinicId = $services['clinic'];
        $this->selectedDoctorId = $services['doctor'];
    }

    private function savedRegistration($patient_id, $data)
    {
        $tanggalHariIni = Carbon::today();
        $jumlahPendaftaranHariIni = Registration::whereDate('created_at', $tanggalHariIni)->count();
        $no_antrian = $jumlahPendaftaranHariIni + 1;

        $saveRegistration = Registration::create([
            'patient_id' => $patient_id ?? null,
            'tanggal' => Carbon::today(),
            'jenis_pendaftaran' => $data['jenis_pendaftaran'] ?? null,
            'jenis_pasien' => $data['jenis_pasien'] ?? null,
            'clinic_id' => $data['clinic_id'] ?? null,
            'doctor_id' => $data['doctor_id'] ?? null,
            'no_antrian' => $no_antrian,
            'user_id' => auth()->user()->id,
            'uuid_satu_sehat' => null
        ]);

        return $saveRegistration;
    }

    public function render()
    {
        return view('livewire.registration.old-patient-form');
    }
}
