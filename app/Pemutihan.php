<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Pemutihan extends Model
{
    protected $table = 'pemutihans';
    protected $primaryKey = 'id_infoPemutihan';
    protected $fillable = [
        'id_infoPemutihan','judul_pemutihan','konten_pemutihan','foto_pemutihan'
    ];
}
