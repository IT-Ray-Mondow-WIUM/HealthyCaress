<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class diagnosaPasien extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'patient_diagnosis';
    protected $fillable = [
        'pasien_id',
        'icd_x_id',
        'pegawai_id',
        'jenis_kasus',
        'user_id',
        'kronis',
        'pendaftaran_id',
        'uuid_satu_sehat',
    ];
}
