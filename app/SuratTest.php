<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratTest extends Model
{   
    protected $table = "surat_test";

    protected $dates = [
        'created_at'
    ];

    protected $fillable = array(
    	'name', 
    	'nim',
    	'angkatan',
    );

    public function student()
    {
		return $this->belongsTo('App\Student', 'student_id');
	}
}
