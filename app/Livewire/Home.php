<?php

namespace App\Livewire;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Pasien;
use Livewire\Component;

class Home extends Component
{
    public $pasien, $dokter, $poliklinik, $ruang;

    public function mount()
    {
        $this->pasien = $this->countPatients();
        $this->dokter = $this->countDoctors();
        $this->poliklinik = $this->countClinics();
        $this->ruang = 0;
    }

    public function render()
    {
        return view('livewire.home');
    }

    private function countPatients()
    {
        return Pasien::count();
    }
    private function countDoctors()
    {
        return Doctor::count();
    }
    private function countClinics()
    {
        return Clinic::count();
    }
}
