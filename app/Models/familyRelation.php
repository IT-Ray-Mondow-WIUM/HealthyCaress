<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class familyRelation extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'family_relations';
    protected $fillable = ['hubungan'];
    protected $dates = ['deleted_at'];
}
