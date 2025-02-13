<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Registration extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'registrations';
    protected $fillable = [
        'patient_id',
        'tanggal',
        'jenis_pendaftaran',
        'jenis_pasien',
        'clinic_id',
        'doctor_id',
        'no_antrian',
        'user_id',
        'uuid_satu_sehat'
    ];

    // Tentukan kolom yang merupakan tipe tanggal
    protected $dates = ['deleted_at'];

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patient()
    {
        return $this->belongsTo(Pasien::class, 'patient_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
