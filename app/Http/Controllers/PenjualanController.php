<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::orderBy('created_at', 'asc')->with('pelanggan')->paginate(10);
        return response()->json($penjualan);
    }

    public function store(Request $request)
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_pelanggan' => 'required|numeric',
            'tanggal_penjualan' => 'required|date',
            'total_penjualan' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $penjualan = new Penjualan();
        $penjualan->id_pelanggan = $request->input('id_pelanggan');
        $penjualan->tanggal_penjualan = $request->input('tanggal_penjualan');
        $penjualan->total_penjualan = $request->input('total_penjualan');

        // Simpan data ke dalam database
        $penjualan->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, Penjualan $penjualan)
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_pelanggan' => 'required|numeric',
            'tanggal_penjualan' => 'required|date',
            'total_penjualan' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $penjualan->id_pelanggan = $request->input('id_pelanggan');
        $penjualan->tanggal_penjualan = $request->input('tanggal_penjualan');
        $penjualan->total_penjualan = $request->input('total_penjualan');

        // Simpan data ke dalam database
        $penjualan->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
