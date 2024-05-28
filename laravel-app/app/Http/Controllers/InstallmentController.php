<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;
use Psy\VersionUpdater\Installer;

class InstallmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('admin.users.daftar_angsuran',[
            "title" => "Angsuran",
            "installment" => Installment::where('id','!=','0')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.users.angsuran',[
            'title' => 'Daftar Angsuran'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate ([
            'username' => 'required|exists:users,username',
            'angsuran_ke' => 'required|numeric',
            'angsuran' => 'required',
        ]);
        $username = $request->username;
        $identifier = User::where('username',$username)->firstOrFail();
        $loan = Loan::where('user_id',$identifier->id)->firstOrFail();
        $installment = new Installment();
        $installment->fill($data);
        $installment -> pembayaran = $request->angsuran;
        $installment->user_id = $identifier -> id;

        $loan -> jumlah_angsuran -= 1;
        $loan -> save();

        $installment->save();
        dd('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Installment $installment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Installment $installment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Installment $installment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Installment::destroy($id);
        // $installment->delete();
    
        return redirect()->back()->with('success', 'Loan deleted successfully.');

    }
}
