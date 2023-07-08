<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CalculatorController;

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

Route::get('/calculator/form',[CalculatorController::class,'form']);
Route::get('/calculator/result',[CalculatorController::class,'result']);
Route::get('/calculator/logs',[CalculatorController::class,'logs']);
Route::get('/calculator/queries',[CalculatorController::class,'queries']);
Route::get('/calculator/show/{id}',[CalculatorController::class,'show']);
Route::get('/calculator/update/{id}',[CalculatorController::class,'update']);
Route::post('/calculator/savedata/{id}',[CalculatorController::class,'savedata']);
Route::post('/calculator/destroy/{id}',[CalculatorController::class,'destroy']);


// Always use get mothod to get data from the server
Route::get('/calculator',[CalculatorController::class,'index']);
Route::get('/calculator/create',[CalculatorController::class,'create']);
// Always use post method to send Data to the server (first time)
Route::post('/calculator/{id}',[CalculatorController::class,'store']);
Route::get('/calculator/{id}',[CalculatorController::class,'show']);
Route::get('/calculator/edit/{id}',[CalculatorController::class,'edit']);
// update an information for an existing resource then use put
Route::put('/calculator/{id}',[CalculatorController::class,'update']);
// delete existing resource the use delete request
Route::delete('/calculator/{id}',[CalculatorController::class,'destroy']);

Route::resource('temparature', ConverterController::class);