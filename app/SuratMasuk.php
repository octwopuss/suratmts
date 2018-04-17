<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $table = 'suratmasuk';

    protected $fillable = [
    	'tanggal',
    	'pengirim',
    	'nomor_surat',
    	'perihal'
    ];
}
