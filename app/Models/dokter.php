<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_dokter',
        'nip',
        'jenis_kelamin',
        'alamat',
    ];
}
