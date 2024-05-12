<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use app\Models\Nasabah;
use App\Http\Controllers\Admin\{AuthController, ProfileController, UserController};
use App\Http\Controllers\SubmissionController;
use App\Models\User;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/admin/login',[AuthController::class,'getLogin'])->middleware('guest')->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::post('/pengajuan',[SubmissionController::class,'submission'])->name('submission');

Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');

Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/customer/dashboard',[ProfileController::class,'customer'])->name('customer');


    Route::get('customer/status',[UserController::class,'status'])->name('user.status');
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/users',[UserController::class,'users'])->name('users.list');

    //CRUD SUBMISSION
    Route::get('/admin/validasi',[UserController::class,'validasi'])->name('validasi');
    Route::patch('/admin/validasi/{submission}/toggle', [UserController::class, 'toggleStatus'])->name('toggleStatus');
    Route::patch('/admin/validasi/{submission}/return', [UserController::class, 'toggleReturn'])->name('toggleReturn');
    Route::delete('/admin/validasi/{submission}', [UserController::class, 'destroy'])->name('destroy');
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