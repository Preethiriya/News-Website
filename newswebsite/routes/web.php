<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\registerController;
use App\Http\Controllers\deleteController;
use App\Http\Controllers\editController;
use App\Http\Controllers\useraddController;



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
Route::view('/home','home');
Route::view('/login','login');
Route::post('/store',[registerController::class,'store']);
Route::get('authenticate/{name}',[LoginController::class,'authenticate']);
Route::view('addnews','addnews');
Route::post('addnews',[useraddController::class,'store']);
Route::view('retrivenews','retrivenews');
Route::get('allnews',[useraddController::class,'view'])->name('allnews');;
Route::get('delete/{id}', [deleteController::class, 'destroy'])->name('delete.destroy');

Route::get('edit-news/{id}',[editcontroller::class,'edit'])->name('edit.edit');
Route::put('update-news/{id}',[editController::class,('update')])->name('edit.update');

