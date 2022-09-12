<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
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

Route::get('/', [homeController::class, 'show']);

Route::middleware(['auth'])->group(function() {

    Route::post('/post', [DashboardController::class, 'create'])->name('post');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/showtable', [DashboardController::class, 'showTable']);
    Route::get('/destroy/{id}', [DashboardController::class, 'destroy'])->name('destroy');
});

require __DIR__.'/auth.php';