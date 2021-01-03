<!-- View Angkatan -->
<form method="GET" action="{{ url('cariAngkatan') }}">
    @csrf
    <select id="angkatan" name="angkatan" class="form-select" aria-label="Default select example">
        <option selected">-</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
    </select>
    <button type="submit">Cari</button>
</form>

<!-- Controller -->
public function cariNilai(Request $request)
{
$datas = Nilai::where('angkatan', $request->angkatan);
return view('mahasiswa.cekAngkatan', compact('datas'));
}

<!-- Index Angkatan -->
@foreach($datas as $data)
<tr>
    <td>{{$data->nim}}</td>
    <td>{{$data->nama}}</td>
    <td>{{$data->prodi}}</td>
    <td>{{$data->angkatan}}</td>
    <td>{{$data->nilai_pk2maba}}</td>
    <td>{{$data->kkm_pk2maba}}</td>
    <td>{{$data->status_kelulusan}}</td>
    <td>
        <a href="{{ asset('images_data/'. $data->sertifikat) }}" target="_blank" rel="noopener noreferrer">Lihat Sertifikat</a>
    </td>
</tr>
@endforeach


public function cariNilai(Request $request)
{
$nilai = Nilai::where('nim', $request->cariNim)->first();
if ($nilai===null){
return redirect('ceknilai')->with(['fail' => 'Data Nilai Berdasarkan NIM ' . $request->cariNim . ' Tidak Ditemukan']);
}
else {
return view('mahasiswa.cariNilai', compact('nilai'));
}
}

<!-- ============== IMPORT with Collection ================= -->

<?php

namespace App\Imports;

use App\Nilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithUpserts;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;

class NilaiImport implements
    // ToModel, 
    ToCollection,
    WithHeadingRow,
    // SkipsOnError, 
    // WithValidation, 
    WithUpserts
// WithValidation
// SkipsOnFailure
{
    // use Importable, SkipsErrors;
    // SkipsFailures, SkipsErrors

    // public function model(array $row)
    // {
    //     return new Nilai([
    //         'nim' => $row['nim'],
    //         'nama' => $row['nama'],
    //         'prodi' => $row['program_studi'],
    //         'angkatan' => $row['angkatan'],
    //         'nilai_pk2maba' => $row['nilai_pk2maba'],
    //         'kkm_pk2maba' => $row['kkm_pk2maba'],
    //         'status_kelulusan' => $row['status_kelulusan'],
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $nilai = Nilai::updateOrCreate([
                'nim' => $row['nim'],
                'nama' => $row['nama'],
                'prodi' => $row['program_studi'],
                'angkatan' => $row['angkatan'],
                'nilai_pk2maba' => $row['nilai_pk2maba'],
                'kkm_pk2maba' => $row['kkm_pk2maba'],
                'status_kelulusan' => $row['status_kelulusan']
            ]);
        }
    }
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $nilai = Nilai::updateOrCreate(
                ['nim' => $row['nim']],
                [
                    'nama' => $row['nama'],
                    'prodi' => $row['program_studi'],
                    'angkatan' => $row['angkatan'],
                    'nilai_pk2maba' => $row['nilai_pk2maba'],
                    'kkm_pk2maba' => $row['kkm_pk2maba'],
                    'status_kelulusan' => $row['status_kelulusan']
                ]
            );
        }
    }

    // public function onError(Throwable $error){
    // }

    // public function rules(): array
    // {
    //     return [
    //         '*.nim' => ['string', 'unique:nilais,nim']
    //     ];
    // }

    // public function onFailure(Failure ...$failures)
    // {

    // }

    public function uniqueBy()
    {
        return 'nim';
    }
}
