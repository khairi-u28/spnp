<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Nilai;


class SIAMController extends Controller
{
    public function cekSIAM(Request $request)
    {
        $response = Http::post('https://bemfilkom.ub.ac.id/secure/api/auth/', [
            'nim' => $request->nim,
            'password' => $request->password,
        ]);
        $token = json_decode($response->getBody(true)->getContents());
        if($token->status===1){
            $nilai = Nilai::where('nim', $request->nim)->first();
            $destination = "/images_nilai/$nilai->sertifikat";
            return redirect($destination);
        }
        else{
            return redirect('ceknilai')->with(['fail' => 'NIM & Password SIAM tidak sesuai']);
        }
    }
}