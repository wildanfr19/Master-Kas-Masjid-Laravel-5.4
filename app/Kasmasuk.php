<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kasmasuk extends Model
{
   protected $fillable = [
   	'tgl_kas_masuk',
   	'nama',
   	'keterangan',
   	'jumlah',
   ];
}
