<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class employee extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'employee';

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'no_telp',
        'agama',
        'nik',
        'position_id'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'employee_id');
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class, 'employee_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
