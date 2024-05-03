<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{

    public function index()
    {
        $detailPenjualan = DetailPenjualan::orderBy('created_at', 'asc')->with('penjualan')->paginate(10);
        return response()->json($detailPenjualan);
    }

    public function store(Request $request)
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_penjualan' => 'required|numeric',
            'id_produk' => 'required|numeric',
            'jumlah_produk' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $sales = new DetailPenjualan();
        $sales->id_penjualan = $request->input('id_penjualan');
        $sales->id_produk = $request->input('id_produk');
        $sales->jumlah_produk = $request->input('jumlah_produk');
        $sales->subtotal = $request->input('subtotal');

        // Simpan data ke dalam database
        $sales->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, DetailPenjualan $detailPenjualan)
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_penjualan' => 'required|numeric',
            'id_produk' => 'required|numeric',
            'jumlah_produk' => 'required|numeric',
            'subtotal' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $detailPenjualan->id_penjualan = $request->input('id_penjualan');
        $detailPenjualan->id_produk = $request->input('id_produk');
        $detailPenjualan->jumlah_produk = $request->input('jumlah_produk');
        $detailPenjualan->subtotal = $request->input('subtotal');

        // Simpan data ke dalam database
        $detailPenjualan->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);        
    }

    public function destroy(DetailPenjualan $detailPenjualan)
    {
        $detailPenjualan->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
