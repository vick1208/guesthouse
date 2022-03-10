<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;

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



Route::group(['middleware'=>'guest'],function(){
    Route::get('login',[LoginController::class,'index'])->name('login');
});

Route::group(['middleware'=>['auth','roleCheck:Super']],function(){
    Route::resource('dashboard/user',UserController::class);
});


Route::group(['middleware'=>['auth','roleCheck:Super,Admin']],function(){
    Route::get('dashboard',function(){
        return view('dashboard.index');
    });
    Route::resource('dashboard/guest',GuestController::class);
    Route::resource('dashboard/room',RoomController::class);

});
