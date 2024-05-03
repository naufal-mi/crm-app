<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index()
    {
        $produk = Produk::orderBy('created_at', 'asc')->paginate(10);
        return response()->json($produk);
    }

    public function store(Request $request)
    {
         // Validasi input
         $validatedData = $request->validate([
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $produk = new Produk();
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga_produk = $request->input('harga_produk');

        // Simpan data ke dalam database
        $produk->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, Produk $produk) 
    {
         // Validasi input
         $validatedData = $request->validate([
            'nama_produk' => 'required|string',
            'harga_produk' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $produk->nama_produk = $request->input('nama_produk');
        $produk->harga_produk = $request->input('harga_produk');

        // Simpan data ke dalam database
        $produk->save();

        return response()->json(['message' => 'Data berhasil diupdate'], 200);
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
