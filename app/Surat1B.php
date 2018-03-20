<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat1B extends Model
{
    protected $table = 'surat_1_b';

    protected $fillable = array(    	
    	'alamat_rumah',
    	'telepon',
    	'instansi',
    	'alamat_instansi',
    	'telp_instansi',
    	'keperluan_data',    
    	'tujuan_instansi',
    	'alamat_tujuan'
    );

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }
}
