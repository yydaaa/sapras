<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKabar;
use Illuminate\Support\Facades\Storage;

class SuratKabarController extends Controller
{
    // Menampilkan form untuk input data surat
    public function create()
    {
        return view('admin.surat_kabar.create'); // Ganti dengan view yang sesuai
    }

    // Menyimpan data surat ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'namaDokumen' => 'required|string|max:255',
            'namaPengirim' => 'required|string|max:255',
            'namaPenerima' => 'required|string|max:255',
            'kategori' => 'required|in:Masuk,Keluar',
            'tujuan' => 'required|in:Pendidikan,Pemerintahan',
            'file' => 'required|file|max:10240|mimes:pdf,doc,docx',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            
            // Mengubah nama file berdasarkan nama dokumen yang dimasukkan, mengganti spasi dengan underscore
            $fileName = str_replace(' ', '_', $request->namaDokumen) . '.' . $file->getClientOriginalExtension();
            
            // Menyimpan file ke folder surat_files di storage public
            $filePath = $file->storeAs('surat_files', $fileName, 'public');
        }

        // Menyimpan data surat ke database
        SuratKabar::create([
            'nama_dokumen' => $request->namaDokumen,
            'nama_pengirim' => $request->namaPengirim,
            'nama_penerima' => $request->namaPenerima,
            'kategori' => $request->kategori,
            'tujuan' => $request->tujuan,
            'file_path' => $filePath
        ]);

        // Redirect ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Surat berhasil disimpan!');
    }
}
