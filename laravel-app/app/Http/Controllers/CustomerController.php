<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Payment;
use App\Models\User;
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
            return redirect('/customer/pembayaran')->with('success','Pembayaran Anda telah diterima dan akan diverifikasi oleh admin!');
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
}
