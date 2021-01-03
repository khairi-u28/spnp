<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pk2maba extends Model
{
    protected $table = 'pk2mabas';
    protected $primaryKey = 'id_pk2maba';
    protected $fillable = [
        'id_pk2maba','judul_pk2maba','konten_pk2maba','foto_pk2maba'
    ];
}
