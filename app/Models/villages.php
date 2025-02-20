<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class villages extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'villages';

    protected $fillable = [
        'nama',
        'kode',
        'district_kode'
    ];

    protected $dates = ['deleted_at'];

    public function kota()
    {
        return $this->belongsTo(districts::class, 'district_kode');
    }

    public function patient()
    {
        return $this->hasMany(Pasien::class, 'village_kode', 'kode');
    }
}
