<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'pasien';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'status_pernikahan',

        'province_kode',
        'city_kode',
        'district_kode',
        'village_kode',
        'alamat',
        'rt',
        'rw',
        'agama_id',
        'pekerjaan_id',
        'jenis_identitas',
        'no_identitas',
        'kewarganegaraan',

        'jenis_pasien',
        'nama_penanggung',
        'hubungan_keluarga_id',
        'telepon_penanggung',

        'telepon_rumah',
        'telepon_mobile',
        'email',

        'no_kartu',
        'user_id',

        'no_rm',
        'no_pasien_lama',
        'ihs',
        'images',
    ];

    protected $dates = ['deleted_at'];

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'patient_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function province()
    {
        return $this->belongsTo(Provinces::class, 'province_kode', 'kode');
    }
    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_kode', 'kode');
    }
    public function district()
    {
        return $this->belongsTo(Districts::class, 'district_kode', 'kode');
    }
    public function village()
    {
        return $this->belongsTo(Villages::class, 'village_kode', 'kode');
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class, 'agama_id');
    }
    public function job()
    {
        return $this->belongsTo(Works::class, 'pekerjaan_id');
    }
}
