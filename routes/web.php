<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EvaluationController;
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

Route::get('/', function () {
    return view('personalactionform.form');
});
Route::post('submit_paf', [EmployeeController::class, 'store']);
// Route::get('/1', function () {
//     return view('index');
// });
// Route::get('/heelo', function () {
//     alert("Hello");
// });
// Route::get('/display', [EvaluationController::class, 'index']);
// Route::post('submit-form', [EvaluationController::class, 'store']);