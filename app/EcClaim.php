<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcClaim extends Model
{
	public function assessment()
	{
		return $this->belongsTo(Assessment::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
