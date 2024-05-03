<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $lead = Lead::orderBy('created_at', 'asc')->with('pelanggan')->paginate(10);
        return response()->json($lead);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_pelanggan' => 'required|numeric',
            'status' => 'required|string',
            'sumber' => 'required',
            'tanggal_dibuat' => 'required|date',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        $lead = new Lead();
        $lead->id_pelanggan = $request->input('id_pelanggan');
        $lead->status = $request->input('status');
        $lead->sumber = $request->input('sumber');
        $lead->tanggal_dibuat = $request->input('tanggal_dibuat');

        // Simpan data ke dalam database
        $lead->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }

    public function update(Request $request, Lead $lead)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_pelanggan' => 'required|numeric',
            'status' => 'required|string',
            'sumber' => 'required',
            'tanggal_dibuat' => 'required|date',
        ]);

        // Buat instance model dan isi dengan data dari inputan
        
        $lead->id_pelanggan = $request->input('id_pelanggan');
        $lead->status = $request->input('status');
        $lead->sumber = $request->input('sumber');
        $lead->tanggal_dibuat = $request->input('tanggal_dibuat');

        // Simpan data ke dalam database
        $lead->save();

        return response()->json(['message' => 'Data berhasil diperbarui'], 200);    
    }
    
    public function destroy(Lead $lead)
    {
        $lead->delete();

       return response()->json(['message' => 'Data berhasil dihapus.']);
    }
}
