<?php

namespace App\Livewire\Registration;

use App\Models\Pasien;
use Carbon\Carbon;
use Livewire\Component;

class SearchPatient extends Component
{
    public $query = '';
    public $umur = '-';
    public $patients = [];
    public $selectedPatient = null;

    public $selectedOldPatient;

    public function mount($selectedOldPatient = null)
    {
        $this->selectedOldPatient = $selectedOldPatient;

        // Panggil langsung fungsi selectPatient()
        if (!empty($this->selectedOldPatient)) {
            $this->selectPatient($this->selectedOldPatient);
        }
    }

    public function updatedQuery()
    {
        if (strlen($this->query) > 1) {
            $this->patients = Pasien::where('nama', 'like', '%' . $this->query . '%')
                ->limit(5)
                ->get();
        } else {
            $this->patients = [];
        }
    }

    public function selectPatient($id)
    {
        $this->selectedPatient = Pasien::find($id);
        $this->umur = Carbon::parse($this->selectedPatient->tanggal_lahir)->age;
        $this->query = $this->selectedPatient->name;
        $this->patients = []; // Sembunyikan dropdown

        $this->dispatch('oldPatient', $this->selectedPatient['id']);
    }
    public function render()
    {
        return view('livewire.registration.search-patient');
    }
}
