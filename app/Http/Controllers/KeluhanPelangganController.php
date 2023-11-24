<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KeluhanPelanggan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KeluhanPelangganExport;
use Illuminate\Support\Facades\Storage;

class KeluhanPelangganController extends Controller
{
    public function index()
    {
        $keluhanPelanggan = KeluhanPelanggan::all();
        return response()->json($keluhanPelanggan);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama' => 'required|max:50',
            'email' => 'required|email',
            'nomor_hp' => 'nullable|numeric',
            'flag_aktif' => 'required',
            'status_keluhan' => 'required',
            'keluhan' => 'required',
        ], [
            'nama.max' => 'Text terlalu panjang, maximum 50 characters.',
            'nomor_hp.numeric' => 'Input numeric only.',
            'email.email' => 'format penulisan harus email @'
        ]);

        $keluhan = KeluhanPelanggan::create($validatedData);
        return response()->json($keluhan, ['message' => 'Data Berhasil dimasukan']);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'nama' => 'required|max:50',
            'email' => 'required|email',
            'nomor_hp' => 'nullable|numeric',
            'flag_aktif' => 'required',
            'status_keluhan' => 'required',
            'keluhan' => 'required',
        ]);

        $keluhan = KeluhanPelanggan::findOrFail($id);
        $keluhan->update($validatedData);
        return response()->json($keluhan);
    }

    public function destroy($id)
    {
        $keluhan = KeluhanPelanggan::findOrFail($id);
        $keluhan->delete();
        return response()->json('Keluhan berhasil dihapus');
    }

    public function exportxlsx() 
    {
        return Excel::download(new KeluhanPelangganExport, 'users.xlsx');
    }
    public function exportcsv() 
    {
        return Excel::download(new KeluhanPelangganExport, 'users.csv');
    }
    public function exportpdf() 
    {
        return Excel::download(new KeluhanPelangganExport, 'users.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
    public function exporttxt()
    {
        $data = "Contoh data yang akan diekspor ke file teks.\n";
        Storage::disk('local')->put('exports/data.txt', $data);
    
        return response()->download(storage_path('app/exports/data.txt'))->deleteFileAfterSend(true);
    }
}
