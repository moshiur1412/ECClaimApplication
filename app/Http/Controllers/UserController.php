<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Requestes;
use App\User;
use App\Department;
use App\Faculty;
use Validator;
use Response;
use Auth;
use Image;
use DB;


class UserController extends Controller
{
    public function index()
    {
        if(Auth::user()->role != 'Administrator' && Auth::user()->role != 'EC Manager'){
            return redirect ('/home');
        }
        $users = User::paginate(5);
        return view('users.index', compact('users'));

    }

    public function editUser(Request $req)  
    {
        if(!empty($req->name) && !empty($req->email)){
           $user = User::findOrFail($req->id);
           $user->name = $req->name;
           $user->email = $req->email;
           $user->password = bcrypt($req->password);
           $user->save();
           return response()->json($user);
       }else{
        return Response::json(array('errors' => $validator->getMessageBag()->toArray()));
    }
}


public function EcCoordinator(){
    $users = DB::table('users')
    ->join('faculties', 'users.faculty_id', '=', 'faculties.id')
    ->select('users.name','users.email', 'faculties.name as faculy_name')
    ->get();
    return view('users.eccoordinator', compact('users','faculties'));
}

}
