<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_hewan',
        'nama_pemilik',
        'nama_dokter',
        'riwayat_penyakit',
        'tindakan',
        'status',
        'tanggal_pemeriksaan',
    ];

    public function hewan()
    {
        return $this->belongsTo(hewan::class, 'nama_hewan', 'nama_hewan');
    }

    public function dokter()
    {
        return $this->belongsTo(dokter::class, 'nama_dokter', 'nama_dokter');
    }
}
