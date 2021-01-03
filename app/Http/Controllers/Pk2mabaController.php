<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pk2maba;

class PK2MABAController extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pk2mabas = Pk2maba::latest()->get();
        return view('pk2maba.index', compact('pk2mabas'));
    }
    
    public function create()
    {
        return view('pk2maba.create');
    }

    public function store(Request $request)
    {
        $foto = $request->foto_pk2maba;
        $pk2maba = new Pk2maba;
        
        $pk2maba->judul_pk2maba = $request->judul_pk2maba;
        $pk2maba->konten_pk2maba = $request->konten_pk2maba;

        if($foto===null){            
            $pk2maba->foto_pk2maba = $request->$foto;
        }
        else {
            $namaFile = $foto->getClientOriginalName();        
            $namaFile = "img_pk2maba_" . time() . rand(100, 999) . "." . $foto->getClientOriginalExtension();
            $pk2maba->foto_pk2maba = $namaFile;
            $foto->move(public_path() . '/images_pk2maba', $namaFile);
        }

        $pk2maba->save();
        return redirect('pk2maba')->with(['success' => 'Data Info Seputar PK2MABA Berhasil Disimpan']);        
    }

    public function show($id)
    {
        // $pk2maba = Pk2maba::findOrFail($id);
        // return view('pk2maba.edit', compact('pk2maba'));
    }

    public function edit($id)
    {
        $pk2maba = Pk2maba::findOrFail($id);
        return view('pk2maba.edit', compact('pk2maba'));
    }

    public function update(Request $request, $id)
    {
        $ubah = Pk2maba::findOrFail($id);
        $awal = $ubah->foto_pk2maba;

        $pk2maba = [
            'judul_pk2maba' => $request['judul_pk2maba'],
            'konten_pk2maba' => $request['konten_pk2maba'],
            'foto_pk2maba' => $awal,
        ];

        if($request->foto_pk2maba===null){
            $ubah->update($pk2maba);
            return redirect('pk2maba')->with(['success' => 'Data Info Seputar PK2MABA Berhasil Diperbarui']);;
        }
        else{            
            $request->foto_pk2maba->move(public_path() . '/images_pk2maba', $awal);
            $ubah->update($pk2maba);
            return redirect('pk2maba')->with(['success' => 'Data Info Seputar PK2MABA Berhasil Diperbarui']);;
        }
    }

    public function hapus($id)
    {
        $pk2maba = Pk2maba::where('id_pk2maba',$id)->first();
        $pk2maba->delete();
        return redirect('pk2maba')->with(['success' => 'Data Info Seputar PK2MABA Berhasil Dihapus']);
    }

    public function destroy($id)
    {
        //
    }
}
