<?php 

namespace App\Listeners;

use Auth;
use Carbon\Carbon;

class UpdateLastLogin
{
	
	public function handle($event)
	{
		$user = Auth::user();
		//$user->last_login_at = Carbon::now();
		$user->save();
	}
}