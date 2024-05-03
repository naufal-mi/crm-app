<?php

namespace App\Http\Controllers;

use App\Models\AnalisisPenjualan;
use Illuminate\Http\Request;

class AnalisisPenjualanController extends Controller
{

    public function index()
    {
        $analisisPenjualan = AnalisisPenjualan::orderBy('created_at', 'asc')->paginate(10);
        return response()->json($analisisPenjualan);
    }

    public function store(Request $request)
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_penjualan' => 'required|string',
            'tanggal_analisis' => 'required|date',
            'hasil_analisis' => 'required',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $analisis = new AnalisisPenjualan();
        $analisis->id_penjualan = $request->input('id_penjualan');
        $analisis->tanggal_analisis = $request->input('tanggal_analisis');
        $analisis->hasil_analisis = $request->input('hasil_analisis');

        // Simpan data ke dalam database
        $analisis->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, AnalisisPenjualan $analisisPenjualan)
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_penjualan' => 'required|string',
            'tanggal_analisis' => 'required|date',
            'hasil_analisis' => 'required',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $analisisPenjualan->id_penjualan = $request->input('id_penjualan');
        $analisisPenjualan->tanggal_analisis = $request->input('tanggal_analisis');
        $analisisPenjualan->hasil_analisis = $request->input('hasil_analisis');

        // Simpan data ke dalam database
        $analisisPenjualan->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);
    }

    public function destroy(AnalisisPenjualan $analisisPenjualan)
    {
        $analisisPenjualan->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
