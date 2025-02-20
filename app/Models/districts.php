<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class districts extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $table = 'districts';

    protected $fillable = [
        'nama',
        'kode',
        'city_kode'
    ];

    protected $dates = ['deleted_at'];

    public function kota()
    {
        return $this->belongsTo(cities::class, 'city_kode');
    }

    public function desa()
    {
        return $this->hasMany(villages::class, 'kode');
    }

    public function patient()
    {
        return $this->hasMany(Pasien::class, 'district_kode', 'kode');
    }
}
