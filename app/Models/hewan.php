<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hewan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_hewan',
        'jenis_kelamin',
        'jenis_hewan',
        'umur',
        'nama_pemilik',
        'alamat',
        'no_telp',
        // tambahkan atribut lain yang diperlukan
    ];
}
