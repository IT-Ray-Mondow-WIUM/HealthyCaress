<?php

namespace App\Livewire\Services;

use App\Models\IcdX;
use App\Models\Registration;
use Livewire\Component;

class MainLivewire extends Component
{
    public $activeTab = 'datapribadi';
    public $registrationID, $patient, $registration, $icdx = [];
    public $icdxNull, $kasusNull, $icdxList = [];
    public $searchicdx = "", $jenisKasus = "";

    public $selectedIcdxId;

    public function mount($id)
    {
        $this->registration = Registration::findOrFail($id);
        $this->patient = $this->registration->patient->toArray();
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function updatedSearchicdx()
    {
        if (strlen($this->searchicdx) > 1) {
            $this->icdx = IcdX::where('nama', 'like', '%' . $this->searchicdx . '%')
                ->limit(7)
                ->get();
        } else {
            $this->icdx = [];
        }
    }

    public function selectIcdx($id)
    {
        $selected = Icdx::find($id);

        if ($selected) {
            $this->searchicdx = $selected->no_dtd . " - " . $selected->nama;
            $this->icdx = [];
            $this->selectedIcdxId = $id; // simpan di property baru
        }
    }

    public function addIcdx()
    {
        if (!$this->searchicdx) {
            $this->icdxNull = "Tidak";
        }
        if (!$this->jenisKasus) {
            $this->kasusNull = "Tidak";
        }

        if ($this->searchicdx && $this->jenisKasus) {
            $icd = IcdX::find($this->selectedIcdxId);

            if ($icd) {
                $this->icdxList[] = [
                    'icdx_id'    => $this->selectedIcdxId,
                    'kode'       => $icd->kode,
                    'nama'       => $icd->nama,
                    'jenis_kasus' => $this->jenisKasus
                ];

                // reset input setelah ditambahkan
                $this->searchicdx = null;
                $this->jenisKasus = "";
            }
        }
    }

    public function removeIcdx($index)
    {
        unset($this->icdxList[$index]);
        $this->icdxList = array_values($this->icdxList); // reset index
    }

    public function render()
    {
        return view('livewire.services.main-livewire');
    }
}
