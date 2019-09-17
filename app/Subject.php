<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
	
	public function Department(){
		return $this->hasOne('App\Department', 'department_id');
	}

	public function assessments(){
		return $this->hasMany(Assessment::class);
	}

	public function EcClaim(){
		return $this->hasMany(EcClaim::class);
	}
}
