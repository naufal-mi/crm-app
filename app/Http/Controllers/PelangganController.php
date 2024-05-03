<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::orderBy('created_at', 'asc')->paginate(10);
        return response()->json($pelanggan);
    }
    public function store(Request $request)
    {
         // Validasi input
         $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required',
            'email' => 'required|email',
            'nomerTelephone' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->input('nama');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->email = $request->input('email');
        $pelanggan->nomer_telephone = $request->input('nomerTelephone');

        // Simpan data ke dalam database
        $pelanggan->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required',
            'email' => 'required|email',
            'nomerTelephone' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $pelanggan->nama = $request->input('nama');
        $pelanggan->alamat = $request->input('alamat');
        $pelanggan->email = $request->input('email');
        $pelanggan->nomer_telephone = $request->input('nomerTelephone');

        // Simpan data ke dalam database
        $pelanggan->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);
    }

    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
