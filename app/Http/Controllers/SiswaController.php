<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Tampilkan daftar siswa.
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('admin.siswa.dashboard', compact('siswas'));
    }

    /**
     * Simpan data siswa ke dalam database.
     */
    public function store(Request $request)
{
    try {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        // Simpan data
        $siswa = Siswa::create($validatedData);

        // Response sukses
        return response()->json([
            'success' => true,
            'siswa' => $siswa
        ]);
    } catch (\Exception $e) {
        // Tangani error (bisa tambah log juga)
        return response()->json([
            'success' => false,
            'message' => $e->getMessage()
        ], 500);
    }
}


    /**
     * Reset dan simpan ulang data siswa.
     */
    public function resetStore(Request $request)
    {
        // Validasi data
        $request->validate([
            'siswas' => 'required|array',
            'siswas.*.nama' => 'required|string|max:255',
            'siswas.*.status' => 'required|string|max:50',
            'siswas.*.tanggal_masuk' => 'required|date',
            'siswas.*.tanggal_keluar' => 'nullable|date|after_or_equal:siswas.*.tanggal_masuk',
        ]);

        // Hapus semua data siswa
        Siswa::truncate();

        // Simpan data baru
        foreach ($request->siswas as $data) {
            Siswa::create([
                'nama' => $data['nama'],
                'status' => $data['status'],
                'tanggal_masuk' => $data['tanggal_masuk'],
                'tanggal_keluar' => $data['tanggal_keluar'] ?? null,
            ]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Update data siswa berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update([
            'nama' => $request->nama,
            'status' => $request->status,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $request->tanggal_keluar,
        ]);

        return response()->json(['success' => true, 'siswa' => $siswa]);
    }

    /**
     * Hapus data siswa berdasarkan ID.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return response()->json(['success' => true]);
    }
}
