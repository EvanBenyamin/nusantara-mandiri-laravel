<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.users.daftar_pinjaman',[
            "title" => "Pinjaman",
            "loan" => Loan::where('id','!=',1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.users.pinjaman',[
            "title" => "Tambah Pinjaman"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|exists:users,username',
            'jumlah_pinjaman' => 'required|numeric',
            'lama_angsuran' => 'required|numeric',
            'jatuh_tempo' => 'required'
        ]);
        $username = $request -> username;
        $pinjaman = $request -> jumlah_pinjaman;
        $lama_angsuran = $request -> lama_angsuran;
        $biaya_angsuran = $this -> pembulatan((($pinjaman*0.03*$lama_angsuran)+$pinjaman)/$lama_angsuran,1000);
        $identifier = User::where('username',$username)->firstOrFail();
       $loan = new Loan;
       $loan -> user_id = $identifier->id;
       $loan -> pinjaman = $pinjaman;
       $loan -> jumlah_angsuran = $lama_angsuran;
       $loan -> biaya_angsuran = $biaya_angsuran;
       $loan -> jatuh_tempo = $request->jatuh_tempo;
       $loan -> save ();

       $customer = $loan -> user -> customer ;
       $customer -> skor += 0.05;
       $customer -> save();

        return redirect('/admin/transaksi')->with('success','data pinjaman berhasil di tambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
    
        return redirect()->back()->with('success', 'Loan deleted successfully.');
    }

    function pembulatan($number, $multiple) {
        return ceil($number / $multiple) * $multiple;
    }
}
