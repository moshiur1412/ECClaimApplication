<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\EcClaim;
use Auth;
use DB;

class HomeController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Request $request)

  {

    if( Auth::user()->role == 'Student'){
      return redirect ('/subjects');
    }

    if (Auth::user()->role == 'EC Coordinator') {
     return redirect ('/userfaculty');
   }

   $report_id = $request->report_id;
   $faculites_all = Faculty::all();
   $faculity = Faculty::find($request->faculty_id);
   $year = $request->academic_year;    


   $claim_year = DB::table('ec_claims')->select(DB::raw('YEAR(created_at) year'))->groupBy('year')->orderBy('year', 'desc')->get();

   $claim_count = EcClaim::where('evidence_01', '')->count();
   $date_expare = EcClaim::where('status', 'Date has been expired.')->count();
   return view('home', compact('faculites_all','faculity', 'year', 'report_id','claim_count', 'date_expare','claim_year'));
 }
}
