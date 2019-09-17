<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requestes;
use App\Department;
use App\Faculty;
use Validator;
use Response;
use Auth;
use Image;


class FacultyController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$faculties = Faculty::all();
		$departments = Department::all();
		return view('faculties.index', compact('departments', 'faculties'));

	}
	public function userFaculty()
	{
		$faculty = Faculty::where('id', Auth::user()->faculty_id)->first();
		$departments = Department::where('faculty_id', Auth::user()->faculty_id)->get();
		return view('faculties.userfaculty', compact('departments', 'faculty'));
	}

	public function addFaculty(Request $req)
	{
		$rules = array(
			'faculty_name' => 'required|max:255',
			'ec_coordinator_name' => 'required'
			);
		$validator = Validator::make(Input::all (), $rules);
		if($validator->fails())
			return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
		else{
			$faculty = new Faculty();
			$faculty->faculty_name = $req->faculty_name;
			$faculty->ec_coordinator_name = $req->ec_coordinator_name;
			$faculty->save();
			return response()->json($faculty);

		}
	}
}
