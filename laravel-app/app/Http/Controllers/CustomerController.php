<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
    public function edit (){

        return view ('admin.users.edit',[
            "title" => "Edit Nasabah"
        ]);
    }
}
