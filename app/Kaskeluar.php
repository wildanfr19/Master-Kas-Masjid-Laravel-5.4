<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kaskeluar extends Model
{
    protected $fillable = [
    	'tgl_kas_keluar',
    	'keterangan',
    	'jumlah',
    ];
}
