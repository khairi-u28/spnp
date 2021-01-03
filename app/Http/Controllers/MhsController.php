<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Pemutihan;
use App\Pk2maba;


class MhsController extends Controller
{        
    // NILAI PK2MABA
    public function cariNilai(Request $request)
    {
        $response = Http::get('http://localhost:8048/api/cariNilai', [
            'nim' => $request->cariNim,
        ]);
        $nilai = json_decode($response->getBody(true)->getContents());        

        if (isset($nilai->nim)) {
            return view('mahasiswa.cariNilai', compact('nilai'));
        } else {
            return redirect('ceknilai')->with(['fail' => 'Data Nilai Berdasarkan NIM ' . $request->cariNim . ' Tidak Ditemukan']);
        }
    }

    // INFO PEMUTIHAN
    public function indexPemutihan()
    {
        $pemutihans = Pemutihan::all();
        return view('mahasiswa.infoPemutihan', compact('pemutihans'));
    }

    public function detailPemutihan($id)
    {
        $pemutihan = Pemutihan::findOrFail($id);
        return view('mahasiswa.detailPemutihan', compact('pemutihan'));
    }

    // SEPUTAR PK2MABA
    public function indexPk2()
    {
        $pk2mabas = Pk2maba::all();
        return view('mahasiswa.seputarPK2MABA', compact('pk2mabas'));
    }

    public function detailPk2($id)
    {
        $pk2maba = Pk2maba::findOrFail($id);
        return view('mahasiswa.detailPK2MABA', compact('pk2maba'));
    }
}
