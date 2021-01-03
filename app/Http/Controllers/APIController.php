<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class APIController extends Controller
{    
    public function tampil()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:8048/api/nilai');
        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();        
        return $body;
    }

    public function cek(Request $request)
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
}