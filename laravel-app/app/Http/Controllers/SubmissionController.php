<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use App\Models\Validation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use PhpParser\Node\Expr\AssignOp\Pow;

use function PHPUnit\Framework\returnSelf;

class SubmissionController extends Controller
{
    //Validasi submission
    public function submission(Request $request)
    {   
        $data = $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin'=>'required',
            'alamat' => 'required|max:255',
            'email'=> 'required|email:dns|unique:submissions',
            'keperluan_meminjam' => 'required',
            'telepon'=> 'required|numeric|unique:submissions',
            'status_kepegawaian' => 'required',
            'pendapatan' => 'required',
            'lama_angsuran' => 'required',
            'jumlah_pinjaman' => 'required'
            
        ]);  
        $skor = $this->scoring($request);
        $berkas = implode(', ',$request->kelengkapan_berkas);
        $pendapatan = $request->pendapatan;
        $pinjaman = $request->jumlah_pinjaman;
        
        switch($pendapatan){
            case "<2000000":
            $pendapatan_calc = 1;
            break;
    
            case "2000000 - 3000000":
            $pendapatan_calc = 2;
            break;
         
            case "3000000 - 4000000":
            $pendapatan_calc = 3;
           break;
         
            case "4000000 - 5000000":
            $pendapatan_calc = 4;
            break;
     
            case "5000000 - 6000000":
            $pendapatan_calc = 5;
            break;
          
            case "6000000 - 7000000":
            $pendapatan_calc = 6;
            break;
       
            case "7000000 - 8000000":
            $pendapatan_calc = 7;
            break;
        
            case "8000000 - 9000000":
            $pendapatan_calc = 8;
           break;
        
            case "9000000 - 10000000":
            $pendapatan_calc = 9;
            break;
        
            case ">10000000":
            $pendapatan_calc = 10;
            break;
    
            default:
            $pendapatan_calc = 0;
        }
            //convert pinjaman ke score
               if ($pinjaman <= 1000000){
                $pinjaman_calc=1;
    
            } else if ($pinjaman <= 2000000){
                $pinjaman_calc = 2;
            }
             else if ($pinjaman <= 3000000){
                $pinjaman_calc = 3;
            }
            else if ($pinjaman <= 4000000){
                $pinjaman_calc = 4;
            }
             else if ($pinjaman <= 5000000){
                $pinjaman_calc = 5;
            }
             else if ($pinjaman <= 6000000){
                $pinjaman_calc = 6;
            }
             else if ($pinjaman <= 7000000){
                $pinjaman_calc = 7;
            }
             else if ($pinjaman <= 8000000){
                $pinjaman_calc = 8;
            }
             else if ($pinjaman <= 9000000){
                $pinjaman_calc = 9;
            }
             else if ($pinjaman <= 10000000){
                $pinjaman_calc = 10;
            } else {
                $pinjaman_calc = 10;
            } 

    //____________________FORM SUBMISSION_____________________________        


        if ($pendapatan_calc*$request->lama_angsuran >= $pinjaman_calc
        && $this -> scoring($request) >= 6.35 ){
        $submission = new Submission;
        $submission->fill($data);
        $submission ->skor = $skor;
        $submission ->kelengkapan_berkas = $berkas;
        $submission ->save();
    } else {
        dd('Mohon maaf. Anda belum layak untuk mengjukan pinjaman');
        // $submission = new Submission;
        // $submission->fill($data);
        // $submission ->skor = $skor;
        // $submission ->kelengkapan_berkas = $berkas;
        // $submission ->save();   
    } 


    //______________ENDOF SUBMISSION_______________________
}

    //METODE MPE 
    public function scoring (Request $request){
        $status= (integer)$request->input('status_kepegawaian');
        $jaminan = (count($request->input('kelengkapan_berkas')));
        $pendapatan = (string)$request->input('pendapatan');
        $angsuran = (integer)$request->input('lama_angsuran');
        $pinjaman = (integer)$request->input('jumlah_pinjaman');
        $keperluan = (string)$request->input('keperluan_meminjam');

        //convert pinjaman ke score
        if ($pinjaman <= 1000000){
            $pinjaman_calc=1;

        } else if ($pinjaman <= 2000000){
            $pinjaman_calc = 2;
        }
         else if ($pinjaman <= 3000000){
            $pinjaman_calc = 3;
        }
        else if ($pinjaman <= 4000000){
            $pinjaman_calc = 4;
        }
         else if ($pinjaman <= 5000000){
            $pinjaman_calc = 5;
        }
         else if ($pinjaman <= 6000000){
            $pinjaman_calc = 6;
        }
         else if ($pinjaman <= 7000000){
            $pinjaman_calc = 7;
        }
         else if ($pinjaman <= 8000000){
            $pinjaman_calc = 8;
        }
         else if ($pinjaman <= 9000000){
            $pinjaman_calc = 9;
        }
         else if ($pinjaman <= 10000000){
            $pinjaman_calc = 10;
        } else {
            $pinjaman_calc = 10;
        }

    //convert pendapatan ke score 

       switch($pendapatan){
        case "<2000000":
        $pendapatan_calc = 1;
        break;

        case "2000000 - 3000000":
        $pendapatan_calc = 2;
        break;
     
        case "3000000 - 4000000":
        $pendapatan_calc = 3;
       break;
     
        case "4000000 - 5000000":
        $pendapatan_calc = 4;
        break;
 
        case "5000000 - 6000000":
        $pendapatan_calc = 5;
        break;
      
        case "6000000 - 7000000":
        $pendapatan_calc = 6;
        break;
   
        case "7000000 - 8000000":
        $pendapatan_calc = 7;
        break;
    
        case "8000000 - 9000000":
        $pendapatan_calc = 8;
       break;
    
        case "9000000 - 10000000":
        $pendapatan_calc = 9;
        break;
    
        case ">10000000":
        $pendapatan_calc = 10;
        break;

        default:
        $pendapatan_calc = 0;
    }
      
    //convert keperluan ke score

        switch($keperluan){

            case "Medis":
            $keperluan_calc = 9;
            break;
            case "Pendidikan":
            $keperluan_calc  = 7;
            break;
            case "Rekreasi":
            $keperluan_calc  = 6;
            break;
            case "Rumah":
            $keperluan_calc  = 8;
            break;
            case "Usaha":
            $keperluan_calc  = 10;
            break;
            default:
            $keperluan_calc = 2;
        }

        $mpe = pow($status,0.20) + pow($jaminan,0.05) +
                 pow($pendapatan_calc,0.20)+pow($angsuran,0.20)+
                 pow($pinjaman_calc,-0.3)+pow($keperluan_calc,0.05); 

        
        // $append = [$status,$jaminan,
        // $pendapatan,$angsuran,$pinjaman_calc,
        // $keperluan_calc];

    
        return $mpe;
    }
}