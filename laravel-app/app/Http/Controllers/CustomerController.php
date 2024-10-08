<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
}
