<?php

namespace App\Livewire\Registration;

use App\Models\cities;
use App\Models\districts;
use App\Models\familyRelation;
use App\Models\Pasien;
use App\Models\Provinces;
use App\Models\Registration;
use App\Models\Religion;
use App\Models\villages;
use App\Models\Works;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class NewPatientForm extends Component
{
    use WithFileUploads;
    public $steps = 1;
    public $name, $gender, $birthPlace, $birthDate, $maritalStatus;
    public $citizenship, $identityNum;
    public $province_list, $city_list = [], $district_list = [], $village_list = [];
    public $selectedProvince, $selectedCity, $selectedDistrict, $selectedVillage;
    public $rt, $rw, $detail;
    public $religions_list, $works_list, $religions, $works;
    public $old_patient_num, $nameFamily, $relations_list, $relation, $phoneFamily;
    public $patientPhone, $patientHp, $patientMail;

    public $photo, $filename;

    public $selectedClinicId, $selectedDoctorId;
    protected $listeners = ['services' => 'handleServices'];

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
    }

    public function savePhoto()
    {
        $this->filename = 'photo_' . Str::uuid() . now()->format('dmY') . '.png';
        $this->containData = $this->collectData();
        $this->steps = $this->steps + 1;
    }

    public function kembali()
    {
        $this->province_list = $this->province();
        $this->selectedClinicId = null;
        $this->selectedDoctorId = null;
        $this->steps = $this->steps - 1;
    }

    public function submit()
    {
        $this->containData = $this->collectData();
        // try {
        $savePatient = $this->savedPatient($this->containData);
        if ($savePatient) {
            $tahun = Carbon::now()->format('y');
            $bulan = Carbon::now()->format('n');
            $empatDigitID = str_pad($savePatient->id, 4, '0', STR_PAD_LEFT);

            $savePatient->no_kartu = $tahun . $bulan . $empatDigitID;
            $savePatient->save();

            $this->photo->storeAs('photos', $this->filename, 'public');

            $saveRegistration = $this->savedRegistration($savePatient->id, $this->containData);

            if ($saveRegistration) {
                session()->flash('success', 'Registrasi berhasil!');
                return redirect()->route('registration');
            } else {
                $info = [
                    'status' => 'Gagal Menyimpan',
                    'eror' => $saveRegistration
                ];
                dd($info);
                // $this->dispatchBrowserEvent('show-toast', ['type' => 'error', 'message' => 'Registrasi gagal disimpan!']);
            }
        } else {
            $info = [
                'status' => 'Gagal Menyimpan',
                'eror' => $savePatient
            ];
            dd($info);
            // $this->dispatchBrowserEvent('show-toast', ['type' => 'error', 'message' => 'Pasien gagal disimpan!']);
        }
        // } catch (\Exception $e) {
        //     $this->dispatchBrowserEvent('show-toast', ['type' => 'error', 'message' => 'Terjadi kesalahan!']);
        // }
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

    public function handleServices($services)
    {
        $this->selectedClinicId = $services['clinic'];
        $this->selectedDoctorId = $services['doctor'];
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
            'email' => $this->patientMail,

            'photo_path' => $this->filename,

            'clinic_id' => $this->selectedClinicId,
            'doctor_id' => $this->selectedDoctorId,
            'jenis_pendaftaran' => 'RawatJalan',
            'jenis_pasien' => 'Baru'
        ];

        return $data;
    }

    private function savedPatient($data)
    {
        $jenis_identitas = $data['kewarganegaraan'] == 'WNI' ? 'NIK' : 'Passport';
        $noRm = now()->format('ymd') . "HCL" . substr($data['no_identitas'], -5);
        $savedPatient = Pasien::create([
            'nama' => $data['nama'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir' => $data['tempat_lahir'],
            'status_pernikahan' => $data['status_pernikahan'],

            'province_kode' => $data['province_kode'],
            'city_kode' => $data['city_kode'],
            'district_kode' => $data['district_kode'],
            'village_kode' => $data['village_kode'],
            'alamat' => $data['alamat'],
            'rt' => $data['rt'],
            'rw' => $data['rw'],
            'agama_id' => $data['agama_id'],
            'pekerjaan_id' => $data['pekerjaan_id'],
            'jenis_identitas' => $jenis_identitas,
            'no_identitas' => $data['no_identitas'],
            'kewarganegaraan' => $data['kewarganegaraan'],

            'jenis_pasien' => $data['no_pasien_lama'] ?? 'Baru',
            'nama_penanggung' => $data['nama_penanggung'],
            'hubungan_keluarga_id' => $data['hubungan_keluarga_id'],
            'telepon_penanggung' => $data['telepon_penanggung'],

            'telepon_rumah' => $data['telepon_rumah'],
            'telepon_mobile' => $data['telepon_mobile'],
            'email' => $data['email'],

            'images' => $data['photo_path'],
            'user_id' => auth()->user()->id,

            'no_rm' => $noRm,
            'no_pasien_lama' => $data['no_pasien_lama'],
        ]);

        return $savedPatient;
    }

    private function savedRegistration($patient_id, $data)
    {
        $tanggalHariIni = Carbon::today();
        $jumlahPendaftaranHariIni = Registration::whereDate('created_at', $tanggalHariIni)->count();
        $no_antrian = $jumlahPendaftaranHariIni + 1;

        $saveRegistration = Registration::create([
            'patient_id' => $patient_id,
            'tanggal' => Carbon::today(),
            'jenis_pendaftaran' => $data['jenis_pendaftaran'],
            'jenis_pasien' => $data['jenis_pasien'],
            'clinic_id' => $data['clinic_id'],
            'doctor_id' => $data['doctor_id'],
            'no_antrian' => $no_antrian,
            'user_id' => auth()->user()->id,
            'uuid_satu_sehat'
        ]);

        return $saveRegistration;
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
