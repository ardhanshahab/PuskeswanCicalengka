<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antrian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_hewan',
        'waktu_datang',
        'nomor_antrian',
        'waktu_periksa',
        'waktu_selesai',
        'pendaftaran_id',
    ];

    public function hewan()
    {
        return $this->belongsTo(hewan::class, 'nama_hewan', 'nama_hewan');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(pendaftaran::class, 'pendaftaran_id', 'id');
    }

}
