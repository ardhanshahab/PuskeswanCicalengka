<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_pasien',
        'jenis_kelamin',
        'umur',
        'nama_pemilik',
        'alamat',
        'riwayat_penyakit',
    ];
}
