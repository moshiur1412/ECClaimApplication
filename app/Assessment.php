<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
	public function subject(){
		return $this->belongsTo(Subject::class);
	}

	public function ecclaims()
	{
		return $this->hasMany(EcClaim::class);
	}
	
}
