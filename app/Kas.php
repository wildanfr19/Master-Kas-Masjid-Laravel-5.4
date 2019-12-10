<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kas extends Model
{

	protected $table = 'kass';
    protected $fillable = [
    	'tgl',
    	'nama',
    	'keterangan',
    	'jumlah',
    	'jenis',
    	'masuk',
    	'keluar'
    ];
}
