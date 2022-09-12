<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("default", function () {
    return view("myViews");
});

Route::get("user/{id?}/{name?}", function ($id = null, $name = null) {
    return "ID: " . $id . " <br>Name: " . $name;
});

Route::get("employee/{id?}/{name?}", function ($id = null, $name = null) {
    return "ID: " . $id . " <br>Name: " . $name;
})->whereNumber("id")->whereAlpha("name");

Route::redirect("here", "there");

Route::fallback(function () {
    return "<h1>Masti kr rya too</h1>";
});

// Route::get('/users/{var}', function ($var) {
//     return view('myViews', ['name'=>$var]);
// });

//Route::view("users", "myViews");

//Route::get("user/{id}", [UserController::class, 'show']);