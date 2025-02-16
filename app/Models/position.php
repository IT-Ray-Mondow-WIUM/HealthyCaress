<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class position extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'position';

    protected $fillable = [
        'position'
    ];

    protected $dates = ['deleted_at'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
