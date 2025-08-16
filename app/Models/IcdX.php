<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IcdX extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'icd_x';
    protected $fillable = [
        'no_dtd',
        'kode',
        'nama',
        'menular',
        'alias',
        'estimasi_expired',
        'status',
    ];
}
