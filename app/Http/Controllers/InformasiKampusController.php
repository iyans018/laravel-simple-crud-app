<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiKampus;

class InformasiKampusController extends Controller
{
    public function informasiKampus() {
        $informasi_kampus = InformasiKampus::where('id', 1)->get();

        return view('siakad.informasiKampus.informasi', compact('informasi_kampus'));
    }

    public function updateInformasiKampus(Request $request) {
        $request->validate([
            'nama_universitas' => 'required',
            'email' => 'required',
            'alamat_web' => 'required',
            'no_telepon' => 'required',
            'fax' => 'required',
            'alamat' => 'required'
        ]);

        $informasi_kampus = InformasiKampus::where('id', 1)->update([
            'nama_universitas' => $request->nama_universitas,
            'email' => $request->email,
            'alamat_web' => $request->alamat_web,
            'no_telepon' => $request->no_telepon,
            'fax' => $request->fax,
            'alamat' => $request->alamat
        ]);

        return redirect('informasi')->with('message', 'Data Berhasil Diupdate!');
    }
}
