<?php
 
namespace App\Http\Controllers\Admin;
 
use App\Models\User;
use App\Models\Submission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
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
        return redirect ('admin/validasi')->with('success','pengajuan telah diterima');
    }
    public function toggleReturn (Submission $submission){
        $submission->update(['status_pengajuan' => 0]);
        return redirect ('admin/validasi')->with('success','pengajuan telah diterima');
    }

    public function destroy (Submission $submission){
        Submission::destroy($submission->id);
        return redirect ('admin/validasi')->with('success','submission telah dihapus');
    }
}
