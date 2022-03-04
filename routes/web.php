<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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
    return view('home',[
        'title' => 'Home'
    ]);
});

Route::get('login',[LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('login',[LoginController::class,'auth']);
Route::post('/logout',[LoginController::class,'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');


Route::resource('dashboard/guest',GuestController::class)->middleware('auth');
