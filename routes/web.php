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


Route::get('/user_list',[HomeController::class,"user_list"]);

Route::get('edit/profile',[HomeController::class,"edit_profile"])->name('edit.profile');

//user update
Route::post('update/profile',[HomeController::class,"update_profile"])->name('update_profile');
Route::post('update/picture',[HomeController::class,"update_picture"])->name('update_picture');


//catagory

Route::get('addcatagory',[HomeController::class,"addcatagory"]);
Route::get('catagory/show',[HomeController::class,"show_catagory"])->name('show_catagory');

Route::post('catagory/store',[HomeController::class,"catagory_store"])->name('store');
//delete catagory
Route::get('delete_catagory/{id}',[HomeController::class,"delete_catagory"])->name('delete_catagory');
//catagory edit
Route::get('edit_catagory/{id}',[HomeController::class,"edit_catagory"])->name('edit_catagory');
//update catagory
Route::post('catagory/update',[HomeController::class,"update_catagory"])->name('update_catagory');
//tag
Route::get('tag',[HomeController::class,"tag"])->name('tag');
Route::post('tag/store',[HomeController::class,"tag_store"])->name('tag_store');
Route::get('tag/delete {id}',[HomeController::class,"delete_tag"])->name('delete_tag');
//role
Route::get('/role',[HomeController::class,"role"])->name('role');
