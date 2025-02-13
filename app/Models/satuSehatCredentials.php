<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class satuSehatCredentials extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Tentukan nama tabel jika berbeda dari default
    protected $table = 'satu_sehat_credentials';

    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'organization_id',
        'client_key',
        'secret_key',
        'access_token',
        'token_expiration'
    ];

    // Tentukan kolom yang merupakan tipe tanggal
    protected $dates = ['deleted_at', 'token_expiration'];
}
