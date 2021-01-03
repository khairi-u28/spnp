<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NilaiExport;
use App\Exports\TemplateExport;
use App\Imports\NilaiImport;

class NilaiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $nilais = Nilai::latest()->get();
        return view('nilai.index', compact('nilais'));
    }

    public function cariNilai(Request $request)
    {
        $nilai = Nilai::where('nim', $request->cariNim)->first();
        if ($nilai === null) {
            return redirect('ceknilai')->with(['fail' => 'Data Nilai Berdasarkan NIM ' . $request->cariNim . ' Tidak Ditemukan']);
        } else {
            return view('mahasiswa.cariNilai', compact('nilai'));
        }
    }

    public function create()
    {
        return view('nilai.create');
    }

    public function store(Request $request)
    {
        $sertif = $request->sertifikat;

        // Cek Duplikasi NIM
        $cek = Nilai::where('nim', $request->nim)->first();
        if ($cek === null) {
            $nilai = new Nilai;

            $nilai->nim = $request->nim;
            $nilai->nama = $request->nama;
            $nilai->prodi = $request->prodi;
            $nilai->angkatan = $request->angkatan;
            $nilai->nilai_pk2maba = $request->nilai_pk2maba;
            $nilai->kkm_pk2maba = $request->kkm_pk2maba;
            $nilai->status_kelulusan = $request->status_kelulusan;

            // Cek File Sertifikat
            if ($sertif === null) {
                $nilai->sertifikat = $sertif;
            } else {
                $namaFile = $sertif->getClientOriginalName();
                $namaFile = "img_nilai_" . time() . rand(100, 999) . "." . $sertif->getClientOriginalExtension();
                $nilai->sertifikat = $namaFile;
                $sertif->move(public_path() . '/images_nilai', $namaFile);
            }

            $nilai->save();
            return redirect('nilai')->with(['success' => 'Data Nilai Berhasil Disimpan']);
        } else {
            return redirect()->back()->with(['fail' => 'Data NIM sudah ada']);
        }
    }

    public function edit(Request $request)
    {
        $nilai = Nilai::where('nim', $request->nim)->first();
        return view('nilai.edit', compact('nilai'));
    }

    public function update(Request $request)
    {
        $ubah = Nilai::where('id_nilai', $request->id_nilai)->first();
        $awal = $ubah->sertifikat;
        $baru = $request->sertifikat;
        $destination = public_path() . '/images_nilai';

        $nilai = [
            'nim' => $request['nim'],
            'nama' => $request['nama'],
            'prodi' => $request['prodi'],
            'angkatan' => $request['angkatan'],
            'nilai_pk2maba' => $request['nilai_pk2maba'],
            'kkm_pk2maba' => $request['kkm_pk2maba'],
            'status_kelulusan' => $request['status_kelulusan'],
            'sertifikat' => $awal,
        ];

        if ($request->sertifikat === null) {
            $ubah->update($nilai);
            return redirect('nilai')->with(['success' => 'Data Nilai Berhasil Diperbarui']);
        } else if ($awal === null) {
            $namaFile = "img_nilai_" . time() . rand(100, 999) . "." . $baru->getClientOriginalExtension();
            $request->sertifikat->move($destination, $namaFile);
            $nilai = [
                'nim' => $request['nim'],
                'nama' => $request['nama'],
                'prodi' => $request['prodi'],
                'angkatan' => $request['angkatan'],
                'nilai_pk2maba' => $request['nilai_pk2maba'],
                'kkm_pk2maba' => $request['kkm_pk2maba'],
                'status_kelulusan' => $request['status_kelulusan'],
                'sertifikat' => $namaFile,
            ];
            $ubah->update($nilai);
            return redirect('nilai')->with(['success' => 'Data Nilai Berhasil Diperbarui']);
        } else {
            $request->sertifikat->move($destination, $awal);
            $ubah->update($nilai);
            return redirect('nilai')->with(['success' => 'Data Nilai Berhasil Diperbarui']);
        }
    }

    public function hapus($id)
    {
        $nilai = Nilai::where('id_nilai', $id)->first();
        $nilai->delete();
        return redirect('nilai')->with(['success' => 'Data Nilai Berhasil Dihapus']);
    }

    public function exportExcel()
    {
        return Excel::download(new NilaiExport, 'DataNilai.xlsx');
    }

    public function exportTemplateExcel()
    {
        return Excel::download(new TemplateExport, 'TemplateDataNilai.xlsx');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('excel');
        try {
            Excel::import(new NilaiImport, $file);
            return redirect()->back()->with('success', 'Data Excel Berhasil Di Import');
        } catch (\Exception $ex) {
            return redirect()->back()->with('fail', 'Format Data Excel Salah');
        }
    }
}
