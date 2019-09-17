<?php

namespace App\Http\Controllers;

use App\Http\Requestes;
use Illuminate\Http\Request;
use App\Faculty;
use App\Department;
use App\Subject;
use App\Assessment;
use Auth;
use DB;

class AssessmentController extends Controller
{

	public function index()
	{
		$faculites = Faculty::all(); 
		$assessments = Assessment::orderByDesc('created_at')->paginate(5);
		return view('assessments.index', compact('faculites', 'assessments'));

	}

	public function selectDepartment(Request $req){
		$departments = DB::table('departments')
		->where('faculty_id',$req->faculty_id)
		->get();
		return response()->json($departments);
	}

	public function selectSubject(Request $req){
		$subjects = DB::table('subjects')
		->where('department_id',$req->department_id)
		->get();
		return response()->json($subjects);
	}

	public function addAssessment(Request $req){
		$assessments = new Assessment();
		$assessments->name = $req->name;
		$assessments->deadline = $req->deadline;
		$assessments->subject_id = $req->subject_id;
		$assessments->save();
		return response()->json($assessments);
	}

	public function editAssessment(Request $req){
		$assessments = Assessment::find($req->id);
		$assessments->name = $req->name;
		$assessments->deadline = $req->deadline;
		$assessments->save();
		return response()->json($assessments);
	}

	public function deleteAssessment(Request $req){
		Assessment::find($req->id)->delete();
		return response()->json();

	}
}
