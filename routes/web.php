<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\generatePDFs;
use App\Http\Controllers\IncidentReportController;
use App\Http\Controllers\PersonnelActionFormController;
use Illuminate\Support\Facades\Route;
use function Laravel\Prompts\alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//personnel action form
Route::get('/view-forms',[PersonnelActionFormController::class,'index']);
Route::get('/personnel-form/{id}', [PersonnelActionFormController::class, 'show']);
Route::get('/personnel-form/viewonly/{id}', [PersonnelActionFormController::class, 'showviewonly']);
Route::get('/delete-form/{id}',[PersonnelActionFormController::class,'delete']);
Route::get('/personnel/form/{id}',[PersonnelActionFormController::class,'create']);


Route::post('/submit-store-form', [PersonnelActionFormController::class, 'store']);
Route::post('/update-form/{id}',[PersonnelActionFormController::class,'update']);

//evaluation form
Route::get('evaluation/form/{id}',[EvaluationController::class,'create']);
Route::get('/view-evaluation-form',[EvaluationController::class,'index']);
Route::get('/show-evaluation-form/{id}',[EvaluationController::class,'show']);
Route::get('/delete-evaluation-form/{id}',[EvaluationController::class,'delete']);
Route::post('/submit-evaluation-form',[EvaluationController::class,'store']);
Route::get('/generate-print/{id}',[EvaluationController::class,'print']);

Route::get('generate-blank-form',function(){
    return view('evaluationform.evaluationformblank');
});


//incident report
route::get('/',[IncidentReportController::class,'index']);
Route::get('incident/form/{id}',[IncidentReportController::class,'create']);
Route::get('/show-incident-form/{id}',[IncidentReportController::class,'show']);
Route::post('/submit-incident-form',[IncidentReportController::class,'store']);

//print
Route::get('/generate-pdf',[generatePDFs::class,'generateEvaluationPlain'])->name('generate.pdf');

//employee
route::get('/1',function(){
    return view('all_forms');
});
 