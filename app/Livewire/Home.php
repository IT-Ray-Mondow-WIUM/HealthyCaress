<?php

namespace App\Livewire;

use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\Pasien;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Home extends Component
{
    public $pasien, $dokter, $poliklinik, $ruang, $labels = [], $values = [];

    public function mount()
    {
        $this->pasien = $this->countPatients();
        $this->dokter = $this->countDoctors();
        $this->poliklinik = $this->countClinics();
        $this->ruang = 0;
        $this->registrationCount();
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
    private function registrationCount()
    {
        $data = Registration::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get();

        // Buat label bulan
        $this->labels = $data->map(function ($item) {
            return Carbon::create()->month($item->bulan)->translatedFormat('M');
        });

        // Buat nilai total
        $this->values = $data->pluck('total');
    }
}
