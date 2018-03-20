<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat1A extends Model
{
    protected $table = "surat_1_a";

  	protected $dates = [
        'created_at'
    ];

     protected $fillable = array(    	
    	'alamat_rumah',
    	'telepon',
    	'instansi',
    	'alamat_instansi',
    	'telp_instansi',
    	'keperluan',    	
    );
    
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }
}
