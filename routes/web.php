<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;

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

Route::post('login',[LoginController::class,'auth']);
Route::post('/logout',[LoginController::class,'logout']);
Route::post('/register',[RegisterController::class, 'store']);

Route::get('dashboard',function(){
    return view('dashboard.index');
})->middleware('auth');


Route::resource('dashboard/guest',GuestController::class)->middleware('auth');


Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[LoginController::class,'index'])->name('login');
    Route::get('/register', [RegisterController::class, 'index']);
});
