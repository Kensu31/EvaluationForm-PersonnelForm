<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
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
Route::get('/delete-form/{id}',[PersonnelActionFormController::class,'delete']);
Route::get('/add/personnelform',function(){
    return view('personalactionform.form');
});

Route::post('/submit_store_form', [PersonnelActionFormController::class, 'store']);
Route::post('/update-form/{id}',[PersonnelActionFormController::class,'update']);

//evaluation form
Route::get('evaluation/form',function(){
    return view('evaluationform.form');
});
Route::get('/view-evaluation-form',[EvaluationController::class,'index']);
Route::get('/show-evaluation-form/{id}',[EvaluationController::class,'show']);
Route::get('/delete-evaluation-form/{id}',[EvaluationController::class,'delete']);

Route::post('/submit-evaluation-form',[EvaluationController::class,'store']);
Route::get('/generate-pdf',[EvaluationController::class,'print']);


//print
route::get('',function(){
    return view('evaluationform.pdf');
});