<?php

use App\Http\Controllers\UserController;
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
Route::view('/dashboard','layouts.master');

Route::get('user/add',[UserController::class,'create']);
Route::post('user/add',[UserController::class,'store'])->name('user.add');
Route::get('user/list',[UserController::class,'show'])->name('user.list');

Route::get('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::post('user/edit',[UserController::class,'update'])->name('user.update');

Route::get('user.delete/{id}',[UserController::class,'destroy'])->name('user.delete');
