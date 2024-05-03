<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index()
    {
        $sales = Sales::orderBy('created_at', 'asc')->paginate(10);
        return response()->json($sales);
    }

    public function store(Request $request)
    {
         // Validasi input
         $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'nomer_telepon' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $sales = new Sales();
        $sales->nama = $request->input('nama');
        $sales->email = $request->input('email');
        $sales->nomer_telepon = $request->input('nomer_telepon');

        // Simpan data ke dalam database
        $sales->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, Sales $sales) 
    {
         // Validasi input
         $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'nomer_telepon' => 'required|numeric',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $sales->nama = $request->input('nama');
        $sales->email = $request->input('email');
        $sales->nomer_telepon = $request->input('nomer_telepon');

        // Simpan data ke dalam database
        $sales->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);
    }

    public function destroy(Sales $sales)
    {
        $sales->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
