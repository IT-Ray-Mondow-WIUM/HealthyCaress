<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Kolom yang bisa diisi (mass assignable)
    protected $table = 'item_categories';
    protected $fillable = [
        'name',
        'code',
        'type_id',
    ];
    protected $dates = ['deleted_at'];
}
