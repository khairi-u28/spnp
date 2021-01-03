<?php

namespace App\Imports;

use App\Nilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class NilaiImport implements ToCollection, WithHeadingRow 
{
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
}
