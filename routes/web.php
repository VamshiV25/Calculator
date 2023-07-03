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