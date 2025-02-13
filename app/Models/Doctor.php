<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'doctors';
    protected $fillable = [
        'clinic_id',
        'employee_id',
        'ihs'
    ];

    protected $dates = ['deleted_at'];


    public function registrations()
    {
        return $this->hasMany(Registration::class, 'doctor_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function clinics()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id');
    }
}
