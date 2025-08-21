<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'item_details';
    protected $fillable = [
        'name',
        'category_id',
        'vendor_id',
        'unit_id',
        'first_stock',
        'minimum_stock',
        'net_price',
        'cost_price',
        'active_status',
    ];
    protected $dates = ['deleted_at'];
}
