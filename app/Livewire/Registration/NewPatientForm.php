<?php

namespace App\Livewire\Registration;

use App\Models\cities;
use App\Models\districts;
use App\Models\familyRelation;
use App\Models\Provinces;
use App\Models\Religion;
use App\Models\villages;
use App\Models\Works;
use Livewire\Component;

class NewPatientForm extends Component
{
    public $steps = 1;
    public $name, $gender, $birthPlace, $birthDate, $maritalStatus;
    public $citizenship, $identityNum;
    public $province_list, $city_list = [], $district_list = [], $village_list = [];
    public $selectedProvince, $selectedCity, $selectedDistrict, $selectedVillage;
    public $rt, $rw, $detail;
    public $religions_list, $works_list, $religions, $works;
    public $old_patient_num, $nameFamily, $relations_list, $relation, $phoneFamily;
    public $patientPhone, $patientHp, $patientMail;

    private $containData = [];

    public function mount()
    {
        $this->province_list = $this->province() ?? [];
        $this->gender = 'l';
        $this->maritalStatus = 0;
        $this->citizenship = 0;
        $this->religions_list = $this->religion() ?? [];
        $this->works_list = $this->work() ?? [];
        $this->relations_list = $this->familyRelation() ?? [];
        $this->steps;
    }

    public function savedData()
    {
        $this->containData = $this->collectData();
        $this->steps = $this->steps + 1;
        // dd($this->containData);
    }

    public function savePhoto()
    {
        $this->containData = $this->collectData();
        $this->steps = $this->steps + 1;
        // dd($this->containData);
    }

    public function kembali()
    {
        $this->province_list = $this->province();
        $this->steps = $this->steps - 1;
    }

    public function submit()
    {
        $this->containData = $this->collectData();
        dd($this->containData);
    }

    public function render()
    {
        return view('livewire.registration.new-patient-form');
    }

    private function province()
    {
        $province = Provinces::select('nama', 'kode')->get();
        return $province;
    }
    private function city($prov)
    {
        $city = cities::where('province_kode', $prov)->get();
        return $city;
    }
    private function district($city)
    {
        $district = districts::where('city_kode', $city)->get();
        return $district;
    }
    private function village($district)
    {
        $district = villages::where('district_kode', $district)->get();
        return $district;
    }

    public function updatedSelectedProvince($value)
    {
        $this->city_list = [];
        $this->district_list = [];
        $this->village_list = [];
        $this->selectedCity = null;
        $this->selectedDistrict = null;
        $this->selectedVillage = null;
        $this->city_list = $this->city($value);
    }

    public function updatedSelectedCity($value)
    {
        $this->district_list = [];
        $this->village_list = [];
        $this->selectedDistrict = null;
        $this->selectedVillage = null;
        $this->district_list = $this->district($value);
    }

    public function updatedSelectedDistrict($value)
    {
        $this->village_list = [];
        $this->selectedVillage = null;
        $this->village_list = $this->village($value);
    }

    private function collectData()
    {
        $data = [
            'nama' => $this->name,
            'jenis_kelamin' => $this->gender,
            'tempat_lahir' => $this->birthPlace,
            'tanggal_lahir' => $this->birthDate,
            'status_pernikahan' => $this->maritalStatus == 1 ? 'Sudah Menikah' : 'Belum Menikah',

            'kewarganegaraan' => $this->citizenship == 1 ? 'WNA' : 'WNI',
            'no_identitas' => $this->identityNum,

            'province_kode' => $this->selectedProvince,
            'city_kode' => $this->selectedCity,
            'district_kode' => $this->selectedDistrict,
            'village_kode' => $this->selectedVillage,

            'rt' => $this->rt,
            'rw' => $this->rw,
            'alamat' => $this->detail,

            'agama_id' => $this->religions,
            'pekerjaan_id' => $this->works,

            'no_pasien_lama' => $this->old_patient_num,
            'nama_penanggung' => $this->nameFamily,
            'hubungan_keluarga_id' => $this->relation,
            'telepon_penanggung' => $this->phoneFamily,

            'telepon_rumah' => $this->patientPhone,
            'telepon_mobile' => $this->patientHp,
            'email' => $this->patientMail
        ];

        return $data;
    }

    private function religion()
    {
        $religion = Religion::select('id', 'nama')->get();
        return $religion;
    }
    private function work()
    {
        $work = Works::select('id', 'nama')->get();
        return $work;
    }
    private function familyRelation()
    {
        $relation = familyRelation::select('id', 'hubungan')->get();
        return $relation;
    }
}
