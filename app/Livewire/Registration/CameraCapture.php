<?php

namespace App\Livewire\Registration;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CameraCapture extends Component
{
    use WithFileUploads; // Wajib agar bisa menerima file upload

    public $photo;
    public function updatedPhoto()
    {
        // $filename = 'photo_' . Str::uuid() . now()->format('dmY') . '.png';
        // $path = $this->photo->storeAs('photos', $filename, 'public');
        $this->dispatch('photoCaptured', photo: $this->photo->getRealPath());
        // dd($this->photo);
    }
    public function render()
    {
        return view('livewire.registration.camera-capture');
    }
}
