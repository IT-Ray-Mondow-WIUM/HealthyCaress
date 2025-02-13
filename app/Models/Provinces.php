<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provinces extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Kolom yang bisa diisi (mass assignable)
    protected $table = 'provinces';
    protected $fillable = [
        'nama',
        'kode',
    ];

    // Tentukan kolom yang merupakan tipe tanggal
    protected $dates = ['deleted_at'];

    public function kota()
    {
        return $this->hasMany(cities::class, 'kode');
    }
}
