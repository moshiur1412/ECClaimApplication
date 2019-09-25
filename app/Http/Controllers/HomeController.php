<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculty;
use App\EcClaim;
use Auth;
use DB;

class HomeController extends Controller
{

  protected $ecClaim;
  protected $faculty;

  public function __construct(Faculty $faculty, EcClaim $ecClaim)
  {
    $this->middleware('auth');
    $this->faculty = $faculity;
    $this->ecClaim = $ecClaim;

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
   $faculites_all = $this->faculty::all();
   $faculity = $this->faculty::findOrFail($request->faculty_id);
   $year = $request->academic_year;    


   $claim_year = $this->ecClaim->groupBy('year')->orderBy('year', 'desc')->get();

   $claim_count = $this->ecClaim->where('evidence_01', '')->count();
   $date_expare = $this->ecClaim->where('status', 'Date has been expired.')->count();
   return view('home', compact('faculites_all','faculity', 'year', 'report_id','claim_count', 'date_expare','claim_year'));
 }
}
