<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Nilai;


class SIAMController extends Controller
{
    public function cekSIAM4(Request $request)
    {
        $response = Http::post('https://bemfilkom.ub.ac.id/secure/api/auth/', [
            'nim' => $request->nim,
            'password' => $request->password,
        ]);
        $token = json_decode($response->getBody(true)->getContents());
        if ($token->status === 1) {
            $nilai = Nilai::where('nim', $request->nim)->first();
            $destination = "/images_nilai/$nilai->sertifikat";
            return redirect($destination);
        } else {
            return redirect('ceknilai')->with(['fail' => 'NIM & Password SIAM tidak sesuai']);
        }
    }

    public function cekSIAM2(Request $request)
    {
        $nilai = Nilai::where('nim', $request->nim)->first();
        $destination = "/images_nilai/$nilai->sertifikat";
        return redirect($destination);
    }

    public function cekSIAM3(Request $request)
    {
        $response = Http::get('http://localhost:8048/api/cariNilai', [
            'nim' => $request->nim,
        ]);
        $nilai = json_decode($response->getBody(true)->getContents());
        $destination = "/images_nilai/$nilai->sertifikat";
        return redirect($destination);
    }

    public function cekSIAM(Request $request)
    {
        $response = Http::post('http://backend-bem.herokuapp.com/auth/login', [
            'nim' => $request->nim,
            'pass' => $request->password,
        ]);
        $token = json_decode($response->getBody(true)->getContents());
        if (isset($token->token)) {
            $response = Http::get('http://localhost:8048/api/cariNilai', [
                'nim' => $request->nim,
            ]);
            $nilai = json_decode($response->getBody(true)->getContents());
            $destination = "/images_nilai/$nilai->sertifikat";
            return redirect($destination);
        } else {
            return redirect('ceknilai')->with(['fail' => 'NIM & Password SIAM tidak sesuai']);
        }
    }
}
