<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use app\Models\Nasabah;
use App\Http\Controllers\Admin\{AuthController, ProfileController, UserController};

Route::get('/admin/login',[AuthController::class,'getLogin'])->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::get('/admin/dashboard',[ProfileController::class,'dashboard']) -> name('dashboard');

Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');

Route::group(['middleware'=>['admin_auth']],function(){
     
    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
});

Route::get('/', function () {
    return view('index', [
        "title" => "Home"
    ]);
});
Route::get('/home', function () {
    return view('index', [
        "title" => "Home"
    ]);
});
Route::get('/pengajuan', function () {
    return view('pengajuan', [
        "title" => "pengajuan"
    ]);
});

Route::get('/simulasi', function () {
    return view('simulasi', [
        "title" => "simulasi"
    ]);
});


Route::get('/nasabah', [CustomerController::class,'index']);
Route::get('/nasabah/{customer:user_id}',[CustomerController::class, 'profile']);