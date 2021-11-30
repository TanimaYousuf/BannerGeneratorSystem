<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;

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
    return view('backend.auth.login');
})->name('welcome');
Route::get('/login',[LoginController::class,'showLoginForm'])->name('login');
Route::post('/login/submit',[LoginController::class,'login'])->name('login.submit');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/user-create',[LoginController::class,'showSignUpForm'])->name('user.create');
Route::post('/user-save',[LoginController::class,'store'])->name('user.store');


Route::resource('banners','App\Http\Controllers\BannerController',['names' => 'banners']);
