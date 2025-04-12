<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'surat_kabars';

    protected $fillable = [
        'nama_dokumen',
        'nama_pengirim',
        'nama_penerima',
        'kategori',
        'tujuan',
        'file_path',
    ];
}
