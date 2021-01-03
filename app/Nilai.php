<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilais';
    protected $primaryKey = 'id_nilai';
    protected $fillable = [
        'nim','nama','prodi','angkatan','nilai_pk2maba','kkm_pk2maba','status_kelulusan','sertifikat'
    ];
}
