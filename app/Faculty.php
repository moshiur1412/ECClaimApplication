<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Faculty extends Model
{
	protected $fillable = [
	'id', 'name',
	];

	public function departments(){

		return $this->hasMany(Department::class);
		
	}

	public function users(){

		return $this->hasMany(User::class);
	}

	public function getClaim($year, $report_id)
	{
		$departments = [];
	    foreach ($this->departments as $dep) {
	        array_push($departments, $dep);
	    }

	    $count = 0;
	    foreach ($departments as $dep) {
	        foreach ($dep->users as $user) {
	        	if($report_id==1 || $report_id==3){	        		
	        		foreach ($user->ecclaims as $claim) {
	        			if (empty($year)) {
	        				$count += 1;
	        			} else {
	        				if (Carbon::parse($claim->created_at)->format('Y')==$year) {
			            		$count += 1;
			            	}
	        			}        					            	
		            }
	        	} elseif ($report_id==2) {
	        		if (count($user->ecclaims)>0) {
	            		$count += 1;
	            	}
	        	} 
	            // $user->ecclaims->where('created_at', format('Y'), '=', $year)    
	        }
	    }

	    if ($report_id==3) {
    		$count = ($count * 100)/count(EcClaim::all());
    	}
	    return $count;
	}

	
	
}
