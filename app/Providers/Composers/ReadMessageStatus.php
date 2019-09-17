<?php 

namespace App\Providers\Composers;

use Illuminate\View\View;
use App\EcClaim;
use App\Department;
use App\Subject;
use Auth;
use DB;
class ReadMessageStatus
{
	public function compose(View $view)
	{

		if (Auth::check()) {
			if( Auth::user()->role == 'EC Coordinator' ){
				$ecclaims =  DB::table('ec_claims')
				->select('ec_claims.*', 'faculties.name', 'subjects.name as subject_name')
				->leftJoin('assessments', 'ec_claims.assessment_id','=','assessments.id')
				->leftJoin('subjects', 'assessments.subject_id' ,'=', 'subjects.id')
				->leftJoin('departments','subjects.department_id' ,'=', 'departments.id')
				->leftJoin('faculties', 'departments.faculty_id' ,'=', 'faculties.id')
				->where('faculties.id', Auth::user()->faculty_id)
				->where('ec_claims.status', 'pending')
				->count();

				$view->with('ecclaims', $ecclaims);
			}
		
		if( Auth::user()->role == 'Student' ){
				$ecclaims =  DB::table('ec_claims')
				->where('user_id', Auth::user()->id)
				->where('ec_claims.status', '!=', 'pending')
				->count();
				$view->with('ecclaims', $ecclaims);
			}
		}

	}
}