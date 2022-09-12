<?php

use App\Http\Controllers\studentController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [studentController::class, 'index'])->name('index');
Route::post('/create', [studentController::class, 'create']);
Route::get('/showtable', [studentController::class, 'showTable']);

Route::post('/delete', [studentController::class, 'destroy']);