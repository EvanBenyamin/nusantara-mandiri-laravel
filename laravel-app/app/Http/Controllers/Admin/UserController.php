<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
 
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
            "title" => "nasabah",
            "customer" => User::all()
        ]);
    }
}
