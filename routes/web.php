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

Route::get('/',[PersonnelActionFormController::class,'index']);
Route::get('/personnel-form/{id}', [PersonnelActionFormController::class, 'show']);


Route::post('/submit_store_form', [PersonnelActionFormController::class, 'store']);
Route::post('/update-form/{id}',[PersonnelActionFormController::class,'update']);

// Route::get('/1', function () {
//     return view('index');
// });
// Route::get('/heelo', function () {
//     alert("Hello");
// });
// Route::get('/display', [EvaluationController::class, 'index']);
// Route::post('submit-form', [EvaluationController::class, 'store']);