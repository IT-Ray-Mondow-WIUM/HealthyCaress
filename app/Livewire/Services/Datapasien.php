<?php

namespace App\Livewire\Services;

use App\Models\Registration;
use Carbon\Carbon;
use Livewire\Component;

class Datapasien extends Component
{
    public $registration;
    public $patient;
    public $ages;
    public function mount($id)
    {
        $this->registration = Registration::findOrFail($id);
        $this->patient = $this->registration->patient->toArray();
        $this->ages = Carbon::parse($this->registration->patient->tanggal_lahir)->age;
    }
    public function render()
    {
        return view('livewire.services.datapasien');
    }
}
