<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\returnSelf;

class SubmissionController extends Controller
{
    //Validasi submission
    public function submission(Request $request)
    {
        

        $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'telepon'=> 'required|numeric'

            
        ]);  
        return [$this->scoring($request),$request->all()];
        // return [$this->scoring($request),$this];
        // The blog post is valid...
    }

    //METODE MPE 
    public function scoring (Request $request){
        $status= (integer)$request->input('status_kepegawaian');
        $jaminan = (count($request->input('jaminan')));
        $pendapatan = (integer)$request->input('pendapatan');
        $angsuran = (integer)$request->input('angsuran');
        $pinjaman = (integer)$request->input('pinjaman');
        $keperluan = (string)$request->input('keperluan_meminjam');

        $append = [$status,$jaminan,
        $pendapatan,$angsuran,$pinjaman,
        $keperluan];

    
        return [$append];
    }
}