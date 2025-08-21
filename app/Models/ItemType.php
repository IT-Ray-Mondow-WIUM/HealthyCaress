<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemType extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Kolom yang bisa diisi (mass assignable)
    protected $table = 'item_types';
    protected $fillable = [
        'name',
        'code',
    ];

    protected $dates = ['deleted_at'];
}
