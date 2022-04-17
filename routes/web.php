<?php

use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterGuestController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\RegisterGuest;
use App\Models\Reservation;

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




Route::group(['middleware'=>['auth','roleCheck:Super,Admin'],'prefix'=>'dashboard'],function(){
    Route::get('/',function(){
        return view('dashboard.index');
    });
    Route::resource('/user',UserController::class);
    Route::resource('/guest',GuestController::class);
    Route::resource('/room',RoomController::class);
    Route::get('/register/room',[RegisterGuestController::class,'getRoom']);
    Route::resource('/register',RegisterGuestController::class);
    Route::resource('/reserve',ReservationController::class)->except(['show']);
    // Route::get('/transaction',function(){
    //     return view('dashboard.transaction.index');
    // });
});
