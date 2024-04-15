<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nasabah 
{
    private static $data_nasabah = [
    [
       "nama" => "Andi",
       "pekerjaan" => "Operator",
       "gaji" => "100000" 
    ],    
    [
       "nama" => "BUdi",
       "pekerjaan" => "Karyawan",
       "gaji" => "200000" 
    ]    
    ];  
    public static function all(){
        return self::$data_nasabah;
    }
}
