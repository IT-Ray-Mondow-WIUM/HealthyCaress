<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clinic extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clinics';
    protected $fillable = [
        'name',
        'uuid_satu_sehat'
    ];

    protected $dates = ['deleted_at'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    public function doctor()
    {
        return $this->hasMany(Doctor::class, 'employee_id');
    }
}
