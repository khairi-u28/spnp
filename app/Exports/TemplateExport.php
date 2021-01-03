<?php

namespace App\Exports;

use App\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;



class TemplateExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nilai::where('nim',"175150701111016")->first();
    }

    public function map($nilai): array
    {
        return [
            "175150701111016",
            "Khairi Ubaidah",
            "Teknologi Informasi",
            "2017",
            "98",
            "99",            
            "Lulus",                        
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
