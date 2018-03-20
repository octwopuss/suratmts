<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\SuratTest;
use App\Surat1A;

class Student extends Authenticatable
{
    protected $table = 'student';    

    public function surat()
    {
		return $this->hasMany('App\SuratTest');
	}

	public function surat1A()
	{
		return $this->hasMany('App\Surat1A');
	}

	public function surat1B()
	{
		return $this->hasMany('App\Surat1B');
	}
}