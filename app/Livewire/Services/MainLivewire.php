<?php

namespace App\Livewire\Services;

use App\Models\IcdX;
use App\Models\ItemDetail;
use App\Models\MedicalTreatment;
use App\Models\Registration;
use Livewire\Component;

class MainLivewire extends Component
{
    public $activeTab = 'datapribadi';
    public $registrationID, $patient, $registration, $icdx = [];
    public $icdxNull, $kasusNull, $icdxList = [];
    public $searchicdx = "", $jenisKasus = "";
    public $tindakan, $list_tindakan = [], $jumlah_tindakan, $tindakanTerpilih = [];
    public $bhp, $list_bhp = [], $jumlah_bhp, $bhpTerpilih = [];
    public $resep, $list_resep = [], $jumlah_resep, $resepTerpilih = [];

    public $selectedIcdxId;

    public function mount($id)
    {
        $this->registration = Registration::findOrFail($id);
        $this->list_tindakan = MedicalTreatment::all();
        $this->list_bhp = ItemDetail::where('category_id', 3)->get();
        $this->list_resep = ItemDetail::whereIn('category_id', [1, 2])->get();
        $this->patient = $this->registration->patient->toArray();
        $this->registrationID = $id;
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

    public function addTindakan()
    {
        if ($this->tindakan) {
            $tindakan = MedicalTreatment::find($this->tindakan);
            $this->tindakanTerpilih[] = [
                'tindakan' => $tindakan->name,
                'jumlah' => $this->jumlah_tindakan,
                'tarif' => $tindakan->fee,
                'dokter' => $this->registration->doctor->employee->nama
            ];
        } else {
            $this->tindakanTerpilih = [];
        }

        $this->tindakan = "";
        $this->jumlah_tindakan = '';
    }
    public function removeTindakan($index)
    {
        unset($this->tindakanTerpilih[$index]);
        $this->tindakanTerpilih = array_values($this->tindakanTerpilih); // reset index
    }

    public function addBhp()
    {
        if ($this->bhp) {
            $bhp = ItemDetail::find($this->bhp);
            $this->bhpTerpilih[] = [
                'bhp' => $bhp->name,
                'jumlah' => $this->jumlah_bhp,
                'tarif' => $bhp->cost_price
            ];
        } else {
            $this->bhpTerpilih = [];
        }


        // dd($this->bhp);
        $this->bhp = '';
        $this->jumlah_bhp = '';
    }
    public function removeBhp($index)
    {
        unset($this->bhpTerpilih[$index]);
        $this->bhpTerpilih = array_values($this->bhpTerpilih); // reset index
    }

    public function addRecipe()
    {
        if ($this->resep) {
            $resep = ItemDetail::find($this->resep);
            $this->resepTerpilih[] = [
                'resep' => $resep->name,
                'jumlah' => $this->jumlah_resep,
                'tarif' => $resep->cost_price
            ];
        } else {
            $this->resepTerpilih = [];
        }


        // dd($this->bhp);
        $this->resep = '';
        $this->jumlah_resep = '';
    }
    public function removeRecipe($index)
    {
        unset($this->resepTerpilih[$index]);
        $this->resepTerpilih = array_values($this->resepTerpilih); // reset index
    }

    public function render()
    {
        return view('livewire.services.main-livewire');
        // dd($this->list_bhp);
    }
}
