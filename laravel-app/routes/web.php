<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use app\Models\Nasabah;
use App\Http\Controllers\Admin\{AuthController, ProfileController, UserController};
use App\Http\Controllers\InstallmentController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SubmissionController;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;

Route::get('/admin/login',[AuthController::class,'getLogin'])->middleware('guest')->name('getLogin');
Route::post('/admin/login',[AuthController::class,'postLogin'])->name('postLogin');

Route::post('/pengajuan',[SubmissionController::class,'submission'])->name('submission');

Route::get('/admin/logout',[ProfileController::class,'logout'])->name('logout');

Route::group(['middleware'=>['admin_auth']],function(){
    Route::get('/admin/dashboard',[ProfileController::class,'dashboard'])->name('dashboard');
    Route::get('/customer/dashboard',[ProfileController::class,'customer'])->name('customer');

    //VIEW Route -CUSTOMER
    Route::get('customer/status',[UserController::class,'status'])->name('user.status');
    Route::get('customer/pembayaran',[CustomerController::class,'payment'])->name('user.bayar');
    Route::post('customer/pembayaran/store',[CustomerController::class,'store'])->name('user.store');
    Route::get('customer/transaksi',[Customercontroller::class,'viewPayment'])->name('user.payments');


    //VIEW Route -ADMIN
    Route::get('/admin/users',[UserController::class,'index'])->name('users.index');
    Route::get('/admin/users',[UserController::class,'users'])->name('users.list');
    Route::get('/admin/customers',[UserController::class,'customers'])->name('customers');
    Route::get('/admin/pembayaran',[UserController::class,'paymentSubmission'])->name('paymentData');

    //CRUD SUBMISSION
    Route::get('/admin/validasi',[UserController::class,'validasi'])->name('validasi');
    Route::patch('/admin/validasi/{submission}/toggle', [UserController::class, 'toggleStatus'])->name('toggleStatus');
    Route::patch('/admin/validasi/{submission}/return', [UserController::class, 'toggleReturn'])->name('toggleReturn');
    Route::delete('/admin/validasi/{submission}', [UserController::class, 'destroy'])->name('destroy.submission');

    //CRUD CUSTOMER
    Route::get('/admin/registrasi', function () {
        return view('admin.users.draft', [
            "title" => "Registrasi"
        ]);
    });
    Route::post('admin/registrasi', [UserController::class, 'customerRegistration'])->name('registration');
    Route::post('admin/registrasi/{id}', [UserController::class, 'customerRegistrationPost'])->name('registration.post');
    Route::post('admin/registrasi/{id}/send', [UserController::class, 'customerRegisterationSend'])->name('registration.send');
    Route::post('admin/customers/{username}',[CustomerController::class,'view'])->name('customer.view');
    Route::post('admin/customers/edit/{username}',[CustomerController::class,'edit'])->name('customer.edit');
    Route::patch('admin/customers/edit/{username}/update',[CustomerController::class,'update'])->name('customer.update');

    //Pinjaman
    Route::resource('admin/transaksi', LoanController::class);

    //angsuran
    Route::resource('admin/angsuran',InstallmentController::class);
    Route::post('admin/pembayaran/store/{id}', [CustomerController::class, 'storePayment'])->name('payment.post');
    Route::post('admin/pembayaran/reject/{id}',[CustomerController::class,'rejectPayment'])->name('payment.reject');
});


Route::get('/', function () {
    return view('index', [
        "title" => "Home"
    ]);
});
Route::get('/home', function () {
    return view('index', [
        "title" => "Home"
    ]);
});
Route::get('/pengajuan', function () {
    return view('pengajuan', [
        "title" => "pengajuan"
    ]);
});

Route::get('/simulasi', function () {
    return view('simulasi', [
        "title" => "simulasi"
    ]);
});
Route::get('/kontak', function () {
    return view('kontak', [
        "title" => "Kontak"
    ]);
});


Route::get('/nasabah', [CustomerController::class,'index']);
Route::get('/nasabah/{customer:user_id}',[CustomerController::class, 'profile']);