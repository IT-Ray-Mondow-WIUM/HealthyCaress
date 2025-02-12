<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $pasien, $dokter, $poliklinik, $ruang;

    public function mount()
    {
        $this->pasien = 1250;
        $this->dokter = 50;
        $this->poliklinik = 15;
        $this->ruang = 35;
    }

    public function render()
    {
        return view('livewire.home');
    }
}
