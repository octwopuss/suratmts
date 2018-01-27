<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratTest extends Model
{
    public $timestamps = false;
    protected $table = "surat_test";

    protected $fillable = array(
    	'name', 
    	'nim',
    	'angkatan',
    	'tanggal'
    );
}
