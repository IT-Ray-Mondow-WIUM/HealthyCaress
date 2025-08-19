<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalTreatment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'medical_treatments';

    protected $fillable = [
        'code',
        'name',
        'category',
        'description',
        'fee',
    ];
}
