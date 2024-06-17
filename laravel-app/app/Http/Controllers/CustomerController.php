<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Installment;
use App\Models\Loan;
use App\Models\Payment;
use App\Models\Reorder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index ()
    {
        return view ('nasabah',[
            "title" => "nasabah",
            "customer" => Customer::all()
        ]);
    }
    public function profile (Customer $customer)
    {
        return view ('user',[
            "title" => "Profile",
            "customer" => $customer
        ]);
    }
    public function view (string $username){
        $user = User::where('username', $username)->firstOrFail();
        return view ('admin.users.user',[
            "title" => "profile",
            "user" => $user
        ]);
    }
    public function edit (string $username){
        $user = User::where('username',$username)->firstOrFail();
        return view ('admin.users.edit',[
            "title" => "Edit Nasabah",
            "user" => $user
        ]);
    }
    public function update (string $username, Request $request){
        $user = User::where('username',$username)->firstOrFail();
        $data = $request->validate([
            'nama' => 'required|max:255',
            'jenis_kelamin'=>'required',
            'alamat' => 'required|max:255',
            'keperluan_meminjam' => 'required',
            'telepon'=> 'required|numeric',
            'id_kepegawaian' => 'required',
            'pendapatan' => 'required',
            'username'=>'required',
            // 'kelengkapan_berkas'=>'required'
        ]);
        if ($request->username == $user->username){
        $keperluan = $request->keperluan_meminjam;
        $kepegawaian = $request->id_kepegawaian;
        $customer = Customer::find($user->id);
        $customer->kelengkapan_berkas = implode(', ',$request->kelengkapan_berkas);
        $customer -> fill($data);
        $customer->alasan = $keperluan;
        $customer-> employment_id = $kepegawaian;
        $customer->save();

        $user_data = User::find($user->id);
        $user_data -> username = $request->username;
        $user->save();
        return redirect('/admin/customers')->with('success','Data Nasabah berhasil Diubah!');
        } else {
            return redirect('/admin/customers')->with('error','username tidak boleh diganti!');
        }
    }
    public function payment (){
        return view('admin.customers.payment');
    }
    public function store (Request $request){
        $data = $request->validate([
            'username' => 'required|exists:users,username',
            'angsuran_ke' => 'required|numeric',
            'pembayaran' => 'required',
            'image' => 'image|file|max:4000'
        ]);
        $username = $request->username;
        $identifier = User::where('username',$username)->firstOrFail();
        $payment = new Payment;
        $payment-> user_id = auth()->user()->id;
        $payment -> angsuran_ke = $request-> angsuran_ke;
        $payment -> pembayaran = $request -> pembayaran; 
        if ($request->file('image')){
            $payment->image = $request->file('image')->store('post-images');
            $payment -> save();
            return redirect('/customer/transaksi')->with('success','Pembayaran Anda telah diterima dan akan diverifikasi oleh admin!');
        } else {
            return redirect('/customer/pembayaran')->with('error','Pembayaran harus disertai bukti bayar!');
        }     
    }

    public function viewPayment(){
        $user = auth()->user()->id;
        $payments = Payment::where('user_id',$user)->get();
        return view('admin.customers.daftar_pembayaran',[
            "title" => "Daftar Pembayaran",
            "payments" => $payments
        ]);
    }
    public function storePayment(Request $request, $id)
    {
        $data = $request->validate([
            'payment_id' => 'required|integer|exists:payments,id',
        ]);
        $payment = Payment::findOrFail($data['payment_id']);
        $paymentUser = $payment->user_id;

        $loan = Loan::where('user_id',$paymentUser)->latest()->first();
        
        $angsur = new Installment;
        $angsur -> user_id = $paymentUser;
        $angsur -> angsuran_ke = $payment->angsuran_ke;
        $angsur -> pembayaran = $payment->pembayaran;
        $angsur -> image = $payment -> image;
        $angsur -> save();

        $payment->status = 1;
        $payment -> save();

        $loan->jatuh_tempo = Carbon::parse($loan->jatuh_tempo)-> addDays(30);
        $loan -> jumlah_angsuran -= 1;
        $loan -> save();

        return redirect('admin/angsuran')->with('success','Angsuran berhasil ditambahkan!');
    }
    public function rejectPayment(Request $request, $id){

        $data = $request->validate([
            'payment_id' => 'required|integer|exists:payments,id',
        ]);
        $payment = Payment::findOrFail($data['payment_id']);
        $paymentUser = $payment->user_id;
        $payment -> status = 0;
        $payment -> save();

        return redirect('admin/pembayaran')->with('success','Data Pembayaran Berhasil ditolak!');
    }

    public function reOrder (){
        return view('admin.customers.reorder');
    }

    public function reOrderStore(Request $request,$id){
        
        $request-> validate([
            'jumlah_pinjaman' => 'required',
            'lama_angsuran' => 'required',
            'username' => 'required',
        ]);
        $user = auth()->user()->id;
        $user_loan = Loan::where('user_id',$user)->latest()->first();

        if($user_loan->jumlah_angsuran = 0 ){
            $reorder = new Reorder();
            $reorder -> user_id = $user;
            $reorder -> jumlah_pinjaman = $request->jumlah_pinjaman;
            $reorder -> lama_angsuran = $request -> lama_angsuran;
            $reorder -> save();
            return redirect('/customer/pembayaran')->with('success','Pengajuan anda telah disimpan, dan akan diverifikasi oleh admin!');
        } else {
            return redirect('/customer/dashboard')->with('error','Anda harus melunaskan angsuran anda terlebih dahulu');
        }
    }
}
