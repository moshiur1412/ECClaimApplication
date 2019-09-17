<?php

namespace App\Http\Controllers;

use App\Http\Requestes;
use Illuminate\Http\Request;
use App\Subject;
use App\Department;
use Auth;
use DB;


class SubjectController extends Controller
{
	public function index(Request $req)
	{
		$departments = DB::table('departments')
		->where('id',$req->id)
		->first();

		$subjects = DB::table('subjects')
		->where('department_id',$req->id)
		->get();
		return view('subjects.index', compact('subjects','departments'));
	}
	public function userSubjectList(){

		$subjects = DB::table('subjects')
		->where('department_id', Auth::user()->department_id)
		->leftJoin('assessments', 'assessments.subject_id', '=','subjects.id')
		->select('subjects.id','subjects.name', 'assessments.name as assessment_title', 'assessments.deadline')
		->orderBy('subjects.id')
		->get();
		$departmant = Auth::user()->department;
		return view('subjects.subjectlist', compact('subjects', 'departmant'));

	}
	
}
