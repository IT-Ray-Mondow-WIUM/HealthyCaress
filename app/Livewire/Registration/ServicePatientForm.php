<?php

namespace App\Livewire\Registration;

use App\Models\Clinic;
use App\Models\Doctor;
use Livewire\Component;

class ServicePatientForm extends Component
{
    public $clinic_list = [], $selectedClinicId;
    public $doctor_list = [], $selectedDoctorId;

    public function mount()
    {
        $this->clinic_list = $this->clinic();
    }

    private function clinic()
    {
        $data  = Clinic::select('name', 'id')->get();
        return $data;
    }

    public function updatedSelectedClinicId($value)
    {
        $this->selectedDoctorId = null;
        $this->doctor_list = $this->doctor($value);
    }

    public function services()
    {
        $sendServices = ['clinic' => $this->selectedClinicId, 'doctor' => $this->selectedDoctorId];
        // dd($sendServices);
        $this->dispatch('services', $sendServices);
        // dd($sendServices);
    }

    private function doctor($clinic_id)
    {
        $data = Doctor::where('clinic_id', $clinic_id)->get();
        return $data;
    }

    public function render()
    {
        return view('livewire.registration.service-patient-form');
    }
}
