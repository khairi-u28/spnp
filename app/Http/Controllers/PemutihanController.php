<?php

namespace App\Http\Controllers;

use App\Pemutihan;
use Illuminate\Http\Request;

class PemutihanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $pemutihans = Pemutihan::all();
        return view('pemutihan.index', compact('pemutihans'));
    }

    public function create()
    {
        return view('pemutihan.create');
    }

    public function store(Request $request)
    {
        $foto = $request->foto_pemutihan;
        $pemutihan = new Pemutihan;

        $pemutihan->judul_pemutihan = $request->judul_pemutihan;
        $pemutihan->konten_pemutihan = $request->konten_pemutihan;

        if ($foto === null) {
            $pemutihan->foto_pemutihan = $foto;
        } else {
            $namaFile = $foto->getClientOriginalName();
            $namaFile = "img_pemutihan_" . time() . rand(100, 999) . "." . $foto->getClientOriginalExtension();
            $pemutihan->foto_pemutihan = $namaFile;
            $foto->move(public_path() . '/images_pemutihan', $namaFile);
        }

        $pemutihan->save();
        return redirect('pemutihan')->with(['success' => 'Data Info Pemutihan Berhasil Disimpan']);
    }

    public function hapus($id)
    {
        $pemutihan = Pemutihan::where('id_infoPemutihan', $id)->first();
        $pemutihan->delete();
        return redirect('pemutihan')->with(['success' => 'Data Info Pemutihan Berhasil Dihapus']);
    }

    public function edit($id)
    {
        $pemutihan = Pemutihan::findOrFail($id);
        return view('pemutihan.edit', compact('pemutihan'));
    }

    public function update(Request $request, $id)
    {
        $ubah = Pemutihan::findOrFail($id);
        $awal = $ubah->foto_pemutihan;

        $pemutihan = [
            'judul_pemutihan' => $request['judul_pemutihan'],
            'konten_pemutihan' => $request['konten_pemutihan'],
            'foto_pemutihan' => $awal,
        ];

        if ($request->foto_pemutihan === null) {
            $ubah->update($pemutihan);
            return redirect('pemutihan')->with(['success' => 'Data Info Pemutihan Berhasil Di-Update']);
        } else {
            $request->foto_pemutihan->move(public_path() . '/images_pemutihan', $awal);
            $ubah->update($pemutihan);
            return redirect('pemutihan')->with(['success' => 'Data Info Pemutihan Berhasil Di-Update']);
        }
    }
}
