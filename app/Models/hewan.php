<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hewan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis',
        'umur',
        'pemilik',
        'alamat_pemilik',
        'no_telp_pemilik',
        'tgl_pendaftaran',
        // tambahkan atribut lain yang diperlukan
    ];
}
