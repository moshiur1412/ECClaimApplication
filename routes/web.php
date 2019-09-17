<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('users','UserController@index')->name("users");
Route::post('users/editUser', 'UserController@editUser')->name("editUser");  
Route::get('eccoordinators', 'UserController@EcCoordinator')->name('eccoordinators');

// Admin Faculty Detials information --> 
Route::get('faculties','FacultyController@index')->name('faculties');
Route::get('subjects/{id}','SubjectController@index')->name('subjects');


// Admin Control Assessments -->
Route::get('assessments','AssessmentController@index')->name('assessments');
Route::post('assessments/selectDepartment', 'AssessmentController@selectDepartment')->name("selectDepartment");
Route::post('assessments/selectSubject', 'AssessmentController@selectSubject')->name("selectSubject"); 
Route::post('assessments/addAssessment', 'AssessmentController@addAssessment')->name("addAssessment"); 
Route::post('assessments/editAssessment', 'AssessmentController@editAssessment')->name("editAssessment"); 
Route::post('assessments/deleteAssessment', 'AssessmentController@deleteAssessment')->name("deleteAssessment"); 

// Students Subject List -->
Route::get('subjects','SubjectController@userSubjectList')->name('userSubjectList');
Route::get('ecclaims','EcClaimController@index')->name('ecclaims');
Route::get('claimReports','EcClaimController@claimReports')->name('claimReports');
Route::post('ecclaims/sendReports', 'EcClaimController@sendReports')->name("sendReports"); 


// EC Coordinator EC Claim feedback -->
Route::get('userfaculty','FacultyController@userFaculty')->name('userFaculty');
Route::get('claimFeedback','EcClaimController@claimFeedback')->name('claimFeedback');
Route::post('claimFeedback/acceptClaim', 'EcClaimController@acceptClaim')->name("acceptClaim"); 
Route::post('claimFeedback/rejectClaim', 'EcClaimController@rejectClaim')->name("rejectClaim"); 
