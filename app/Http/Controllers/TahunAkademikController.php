<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAkademik;

class TahunAkademikController extends Controller
{
    public function Thnakademik() {
        $thn_akademik = TahunAkademik::orderBy('created_at', 'desc')->get();

        return view('siakad.tahunAkademik.thnakademik', compact('thn_akademik'));
    }

    public function createThnakademik(Request $request) {
        $request->validate([
            'kode' => 'required',
            'thn_akademik' => 'required',
            'status' => 'required'
        ]);

        TahunAkademik::create([
            'kode' => $request->kode,
            'thn_akademik' => $request->thn_akademik,
            'status' => $request->status,
        ]);

        return redirect('thnakademik')->with('message', 'Data Berhasil Ditambahkan!');
    }

    public function updateThnakademik($id) {
        $thn_akademik = TahunAkademik::find($id);

        return view('siakad.tahunAkademik.editThnakademik', compact('thn_akademik'));
    }

    public function updateProcess(Request $request, $id) {
        $thn_akademik = TahunAkademik::find($id)->update([
            'kode' => $request->kode,
            'thn_akademik' => $request->thn_akademik,
            'status' => $request->status,
        ]);

        return redirect('/thnakademik')->with('message', 'Data Berhasil Diupdate!');
    }

    public function deleteThnakademik(Request $request, $id) {
        TahunAkademik::find($id)->delete();

        return redirect('/thnakademik')->with('message', 'Data Berhasil Didelete!');
    }
}
