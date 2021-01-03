<?php

namespace App\Exports;

use App\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;



class NilaiExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nilai::all();
    }

    public function map($nilai): array
    {
        return [
            $nilai->nim,
            $nilai->nama,
            $nilai->prodi,
            $nilai->angkatan,
            $nilai->nilai_pk2maba,
            $nilai->kkm_pk2maba,            
            $nilai->status_kelulusan,                        
        ];
    }

    public function headings(): array
    {
        return [
            'NIM',
            'Nama',
            'Program Studi',
            'Angkatan',
            'Nilai PK2MABA',
            'KKM PK2MABA',
            'Status Kelulusan',
        ];
    }
}
