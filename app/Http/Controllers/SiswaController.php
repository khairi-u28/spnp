<?php

namespace App\Http\Controllers;
use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {        
        $siswa = new Siswa;
        $siswa->nama = $request->nama;
        $siswa->nim = $request->nim;
        $siswa->save();

        return redirect('siswa')->with(['success' => 'Data Siswa Berhasil Disimpan']);
    }

    public function index()
    {
        $siswas = Siswa::all();
        // return view('siswa.index',compact('siswas'));
        return view('main',compact('siswas'));
    }

    public function hapus($id)
    {
        $siswa = Siswa::where('id',$id)->first();
        $siswa->delete();
        return redirect('siswa')->with(['success' => 'Data Siswa Berhasil Dihapus']);
    }

    public function edit($id)
    {
        $siswa = Siswa::where('id',$id)->first();        
        return view('siswa.edit',compact('siswa'));
    }
    
    public function update(Request $request, $id)
    {
        $siswa = Siswa::where('id',$id)->first();        
        $siswa->nama = $request->nama;
        $siswa->nim = $request->nim;
        $siswa->update();
        return redirect('siswa')->with(['success' => 'Data Siswa Berhasil Di-Update']);
    }
}
