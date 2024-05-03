<?php

namespace App\Http\Controllers;

use App\Models\Interaksi;
use Illuminate\Http\Request;

class InteraksiController extends Controller
{

    public function index()
    {
        $interaksi = Interaksi::orderBy('created_at', 'asc')->with(['pelanggan', 'sales'])->paginate(10);
        return response()->json($interaksi);
    }

    public function store(Request $request)
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_pelanggan' => 'required|numeric',
            'id_sales' => 'required|numeric',
            'tipe_interaksi' => 'required|string',
            'tanggal_interaksi' => 'required|date',
            'catatan' => 'required',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $analisis = new Interaksi();
        $analisis->id_pelanggan = $request->input('id_pelanggan');
        $analisis->id_sales = $request->input('id_sales');
        $analisis->tipe_interaksi = $request->input('tipe_interaksi');
        $analisis->tanggal_interaksi = $request->input('tanggal_interaksi');
        $analisis->catatan = $request->input('catatan');

        // Simpan data ke dalam database
        $analisis->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, Interaksi $interaksi) 
    {
         // Validasi input
         $validatedData = $request->validate([
            'id_pelanggan' => 'required|numeric',
            'id_sales' => 'required|numeric',
            'tipe_interaksi' => 'required|string',
            'tanggal_interaksi' => 'required|date',
            'catatan' => 'required',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $interaksi->id_pelanggan = $request->input('id_pelanggan');
        $interaksi->id_sales = $request->input('id_sales');
        $interaksi->tipe_interaksi = $request->input('tipe_interaksi');
        $interaksi->tanggal_interaksi = $request->input('tanggal_interaksi');
        $interaksi->catatan = $request->input('catatan');

        // Simpan data ke dalam database
        $interaksi->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);        
    }

    public function destroy(Interaksi $interaksi)
    {
        $interaksi->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
