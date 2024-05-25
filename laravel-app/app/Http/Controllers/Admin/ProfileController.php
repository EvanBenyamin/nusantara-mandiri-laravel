<?php

namespace App\Http\Controllers\Admin;
 
use App\Models\Loan;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Submission;

class ProfileController extends Controller
{
    public function dashboard(){
        $data=[
            'title'=>'Dashboard',
            'customer' => Customer::count() -1,
            'loan' => Loan::sum('pinjaman'),
            'submission' => Submission::count()
        ];
        return view('admin.dashboard',$data);
    }
    public function customer(){
        $data=[
            'title'=>'Dashboard'
        ];
        return view('admin.customers.customer',$data);
    }
 
    public function logout(){
        auth()->logout();
        return redirect()->route('getLogin')->with('success','You have been successfully logged out');
    }
}

