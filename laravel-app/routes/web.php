<?php

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


Route::get('/nasabah', function () {
$data_nasabah =[
    [    
        "id" => 1,
        "nama" => "andi",
        "pekerjaan" => "Operators",
        "pinjaman" => "100000"
    ],
    [
        "id" => 2,
        "nama" => "budi",
        "pekerjaan" => "Sales",
        "pinjaman" => "200000"
    ],
    [
        "id" => 3,
        "nama" => "candra",
        "pekerjaan" => "Mandor",
        "pinjaman" => "500000"
    ],
    [
        "id" => 4,
        "nama" => "Dody Ferdianasyah",
        "pekerjaan" => "Manajer",
        "pinjaman" => "200000"
    ],
];

    return view('nasabah',[
        "nasabah" => $data_nasabah
   
    ]);
    
});
