<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;	
use App\Http\Requestes;
use App\Subject;
use App\EcClaim;
use App\Department;
use Validator;
use Response;
use Auth;
use DB;


class EcClaimController extends Controller
{
	
	public function index(){
		if(Auth::user()->role != 'Student' && Auth::user()->role != 'EC Coordinator'){
			return  redirect('/home');
		}
		$subjects = Subject::where('department_id',Auth::user()->department_id)
		->join('assessments', 'assessments.subject_id', '=','subjects.id')
		// ->join('ec_claims', 'ec_claims.assessment_id', '!=','assessments.id')
		->select('subjects.id','subjects.name', 'assessments.name as assessment_title', 'assessments.deadline')
		->get();
		$ecclaims = EcClaim::all();
		return view('ecclaims.index', compact('subjects', 'ecclaims'));
	}

	
	public function sendReports(Request $req)
	{
		$rules = array(
			'assessment_id' => 'required|not_in:0',
			'claim_criteria' => 'required|not_in:0',
			'note' => 'required',
			'evidence_01'=> 'required|mimes:jpg,png,doc,docx,pdf|max:10000'
			);

		$validator = Validator::make(Input::all (), $rules);
		if ($validator->fails())
		{
			return redirect::to('ecclaims')->withErrors($validator);
		}else{
			$ec = new EcClaim();
			$ec->assessment_id = $req->assessment_id;
			$ec->user_id = Auth::user()->id;
			$ec->claim_criteria = $req->claim_criteria;
			$ec->note = $req->note;
			$input_file = $req->file('evidence_01');
			$input_file->move(public_path().'/uploads/',time().$input_file->getClientOriginalName());
			
			$ec->evidence_01 = time().$input_file->getClientOriginalName();
			if($input_file = $req->file('evidence_02')){
				$input_file->move(public_path('/uploads/'),time().$input_file->getClientOriginalName());
				$ec->evidence_02 = time().$input_file->getClientOriginalName();
			}
			if($input_file = $req->file('evidence_03')){

				$input_file->move(public_path('/uploads/'),time().$input_file->getClientOriginalName());
				$ec->evidence_03 = time().$input_file->getClientOriginalName();
			}
			$ec->save();
			return redirect('claimReports');
		}
	}




	public function claimReports(){
		
		if( Auth::user()->role == 'Administrator' || Auth::user()->role == 'EC Manager'){
			$ecclaims = EcClaim::orderByDesc('created_at')->paginate(5);
		} elseif(Auth::user()->role != 'Student' && Auth::user()->role != 'EC Coordinator'){
			return  redirect('/home');
		} else{
			$ecclaims =  EcClaim::where('user_id', Auth::user()->id)->orderByDesc('created_at')
			->paginate(3);
		}
		$subject_name =  DB::table('ec_claims')
		->RightJoin('assessments', 'ec_claims.assessment_id', '=','assessments.id')
		->leftJoin('subjects', 'subjects.id', '=','assessments.subject_id')
		->select( 'subjects.name')
		->get();
		return view('ecclaims.claim_reports', compact('ecclaims','subject_name'));
	}

	public function claimFeedback(){
		$ecclaims = DB::table('ec_claims')
		->select('ec_claims.*', 'faculties.name', 'subjects.name as subject_name')
		->leftJoin('assessments', 'ec_claims.assessment_id','=','assessments.id')
		->leftJoin('subjects', 'assessments.subject_id' ,'=', 'subjects.id')
		->leftJoin('departments','subjects.department_id' ,'=', 'departments.id')
		->leftJoin('faculties', 'departments.faculty_id' ,'=', 'faculties.id')
		->where('faculties.id', Auth::user()->faculty_id)
		->orderByDesc('ec_claims.created_at')
		->paginate(5);
		return view('ecclaims.ecclaim_feedback', compact('ecclaims'));
	}

	public function acceptClaim(Request $req){
		$ecclaims = EcClaim::find($req->id);
		if($req->status != 'pending'){
			$ecclaims->status =  'Accepted : '.$req->status;
			$ecclaims->save();
		}

		return response()->json($ecclaims);
	}

	public function rejectClaim(Request $req){
		$ecclaims = EcClaim::find($req->id);
		if($req->status != 'pending'){
			$ecclaims->status = 'Rejected : '.$req->status;
			$ecclaims->save();
		}
		return response()->json($ecclaims);
	}


}
