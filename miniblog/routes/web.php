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

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/destroy/{id}', [DashboardController::class, 'destroy'])->name('destroy');
    Route::get('/update/{id}', [DashboardController::class, 'show'])->name('update');
    Route::put('/update/{id}', [DashboardController::class, 'update'])->name('update');
    
    Route::get('/post', [PostController::class, 'index'])->name('post');

    Route::put('/post', [PostController::class, 'create'])->name('post');
});

require __DIR__.'/auth.php';