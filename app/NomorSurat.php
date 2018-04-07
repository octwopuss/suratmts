<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NomorSurat extends Model
{

	protected $table = 'nomor_surat';

    protected $fillable = [
    	'nomor',
    	'tipe_nomor'
    ];
}
