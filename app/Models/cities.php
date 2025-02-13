<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cities extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama',
        'kode',
        'province_kode',
    ];

    // Tentukan kolom yang merupakan tipe tanggal
    protected $dates = ['deleted_at'];

    public function provinsi()
    {
        return $this->belongsTo(Provinces::class, 'province_kode');
    }
    public function kecamatan()
    {
        return $this->hasMany(districts::class, 'kode');
    }
}
