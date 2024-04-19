<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use app\Models\Nasabah;


Route::get('/', function () {
    return view('welcome', [
        "title" => "welcome"
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