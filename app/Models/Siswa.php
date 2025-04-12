<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    // Menentukan tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'siswa'; // Sesuaikan dengan nama tabel yang benar di database

    // Izinkan mass assignment untuk field berikut
    protected $fillable = [
        'nama',
        'status',
        'tanggal_masuk',
        'tanggal_keluar',
    ];
}
