<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// create first route in api
Route::get('student',  [StudentController::class,'index'] );
Route::post('student',  [StudentController::class,'upload'] );
Route::put('student/edit/{id}',  [StudentController::class,'edit'] );
Route::delete('student/edit/{id}',  [StudentController::class,'delete'] );