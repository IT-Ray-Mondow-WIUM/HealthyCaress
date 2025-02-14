<?php

namespace App\Livewire\Registration;

use Livewire\Component;

class NewPatientForm extends Component
{
    public $steps = 1;
    public $formData = [
        'name' => ''
    ];
    // protected $rules = [
    //     'formData.name' => 'required|string'
    // ];

    public function mount()
    {
        $this->steps;
    }

    public function steps2()
    {
        $this->steps = $this->steps + 1;
    }

    public function kembali()
    {
        $this->steps = $this->steps - 1;
    }

    public function savedData()
    {
        $this->steps = $this->steps + 1;
    }

    public function render()
    {
        return view('livewire.registration.new-patient-form');
    }
}
