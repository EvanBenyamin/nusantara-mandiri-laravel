<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Models\Loan;
use App\Models\User;
use App\Models\Customer;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    public function index(){
        $data=[
            'title'=>'Users'
        ];
        return view('admin.users.index',$data);
    }
    public function users ()
    {
        return view('admin.users.index',[
            "title" => "Users",
            "user" => User::all()
        ]);
    }
    public function customers (){
        return view('admin.users.nasabah',[
            "title" => "Nasabah",
            "customer" => User::where('id','!=', 1)->get()
        ]);
    }
    public function status (User $user){
        return view ('admin.customers.index',[
            "title" => "status",
            "user" => User::all()
        ]);
    }
    
    public function validasi (){
        return view ('admin.users.validasi',[
            "submission" => Submission::orderByDesc('skor')->where('status_pengajuan', '=', false)->get(),
            "validated" => Submission::orderByDesc('id')->where('status_pengajuan', '=', true)->get()
        ]);
    }

    public function toggleStatus (Submission $submission){
        $submission->update(['status_pengajuan' => !$submission->status]);
        return redirect ('admin/validasi')->with('success','pengajuan telah tervalidasi');
    }
    public function toggleReturn (Submission $submission){
        $submission->update(['status_pengajuan' => 0]);
        return redirect ('admin/validasi')->with('success','validasi dibatalkan');
    }

    public function destroy (Submission $submission){
        Submission::destroy($submission->id);
        return redirect ('admin/validasi')->with('success','submission telah dihapus');
    }
    
    public function customerRegistration(Request $request){
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
            'jumlah_pinjaman' => 'required',
            'username' => 'required'
        ]);  
        $skor = $this->scoring($request);
        $pendapatan = $request->pendapatan;
        $pinjaman = $request->jumlah_pinjaman;
        $berkas = implode(', ',$request->kelengkapan_berkas);
        $username = $request->username;
        $password = Hash::make($request->password);
        $email = $request->email;
        
        dd($data);
    }  

    public function customerRegistrationPost($id){
        $submission = Submission::findOrFail($id);
            return view('admin.users.registrasi', [
            "title" => "Registrasi",
            "submission" => $submission
        ]);
    }
    
    public function customerRegisterationSend(Request $request ,$id){
        $data = $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin'=>'required',
            'alamat' => 'required|max:255',
            'keperluan_meminjam' => 'required',
            'telepon'=> 'required|numeric',
            'id_kepegawaian' => 'required',
            'pendapatan' => 'required',
            'lama_angsuran' => 'required',
            'jumlah_pinjaman' => 'required',
            'image' => 'image|file|max:4000',
            'username'=>'required',
            'email'=> 'required|email:dns|unique:users',
            'password'=>'required'
        ]);  
        // $data['password'] = Hash::make($data['password']);
        $skor = $this->scoring($request);
        $pendapatan = $request->pendapatan;
        $pinjaman = $request->jumlah_pinjaman;
        $berkas = implode(', ',$request->kelengkapan_berkas);
        $username = $request->username;
        $password = Hash::make($request->password);
        $email = $request->email;
        // return request()->all();

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

        $identifier = Submission::findOrFail($id);
        if ($pendapatan_calc*$request->lama_angsuran >= $pinjaman_calc
        && $this -> scoring($request) >= 6.35 ){
        $customer = new Customer;
        $customer -> id = $identifier->id;
        $customer->fill($data);
        $customer ->skor = $skor;
        $customer ->kelengkapan_berkas = $berkas;
        $customer -> alasan = $request -> keperluan_meminjam;
        $customer -> employment_id = $request->id_kepegawaian;
        $customer -> pinjaman = $pinjaman;
        $customer -> user_id = $identifier->id;
        $customer ->save();

        $user = new User;
        $user -> id = $identifier->id;
        $user -> username = $username;
        $user -> customer_id = $identifier->id;
        $user->email = $email;
        $user -> password = $password;
        if ($request->file('image')){
            $user->image = $request->file('image')->store('post-images');
        }
        $user -> save();

        $jumlah_angsuran = $request->lama_angsuran;
        $loan = new Loan; 
        // $loan -> id = $identifier->id;
        $loan -> user_id = $identifier->id;
        $loan -> pinjaman = $pinjaman;
        $loan -> jumlah_angsuran = $jumlah_angsuran;
        $loan -> jatuh_tempo= Carbon::now()->addDays(30);
        $loan -> biaya_angsuran = $this -> pembulatan((($pinjaman*0.03*$jumlah_angsuran)+$pinjaman)/$jumlah_angsuran,1000);
        $loan -> save();
        
        return redirect('/admin/customers')->with('success','Data Nasabah berhasil Ditambah!');
    } else {
        return view('/admin/customers')->with('error','data gagal ditambahkan, periksa kembali data yang dikirim');
    } 


    //______________ENDOF SUBMISSION_______________________
}

    //METODE MPE 
    public function scoring (Request $request){
        $status= (integer)$request->input('id_kepegawaian');
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

    
        return $mpe;
    }
    function pembulatan($number, $multiple) {
        return ceil($number / $multiple) * $multiple;
    }
}    
    
