<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// user
Route::get('edit/profile',[HomeController::class,"edit_profile"])->name('edit.profile');

//user update
Route::post('update/profile',[HomeController::class,"update_profile"])->name('update_profile');
Route::post('update/picture',[HomeController::class,"update_picture"])->name('update_picture');
