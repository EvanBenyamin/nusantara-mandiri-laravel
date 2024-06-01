@extends('admin.customers.main-layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@section('content-header')
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
     <i class="fa fa-bars"></i>
    </button>
 
    <!-- Topbar Search -->
    <form
        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>
 
    <ul class="navbar-nav ml-auto">
    <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('admin_assets/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
    </ul>
</nav>
@endsection
@section('body')
<a href="/admin/transaksi" class="fa fa-arrow-left"></a>
<h2 class="text-center" style="margin-top:2rem; font-family: 'Quicksand', sans-serif;">Form Pembayaran</h2>
<div class="container hidden">
    <form class="user mt-5" method="post" action="{{ route ('user.store')}}" enctype="multipart/form-data" >
      @csrf
      @method('POST')
      @if(session()->has('success'))
      <div class="alert alert-success ml-4 mt-2" role="alert">
          {{ session('success') }}
      </div>      
      @endif
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col-6">
              <label class="form-label" for="">Username</label>
              <div data-mdb-input-init class="form-outline">
                <input type="text" id="username" name="username" class="form-control
                 @error('username') is-invalid @enderror mt-2" required value="{{ auth()->user()->username }}"/>
              </div>
              @error('username')
              <div class="alert alert-danger">
                {{ $message }}
              </div>    
              @enderror
            </div>
            <div class="col-2 mt-2">
                <label class="form-label" for="">Angsuran ke-</label>
                <div data-mdb-input-init class="form-outline">
                    <input type="number" class="form-control" id="angsuran" name="angsuran_ke"
                    value="{{ old('angsuran_ke') }}" placeholder="1" required />
                </div>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-6 md-12 mt-2">
            <div data-mdb-input-init class="form-outline">
              <label class="form-label" for="form1">Jumlah Pembayaran</label>
            <div data-mdb-input-init class="form-outline">
                <input type="text" class="form-control" id="pembayaran" name="pembayaran"
                value="{{ auth()->user()->latestLoan->biaya_angsuran }}" placeholder="Cth: 500000, 250000" required />
            </div>
            </div>
        </div>
        <div class="col-lg-6 md-12 mt-2">
        <label for="date" class="col-form-label">Bukti Bayar</label>
        <div class="input-group" id="datepicker">
            <input type="file" name="image" id="image">
            <span id="startDateSelected"></span>
        </div>
        </div>
            <div class="row">
                <div class="col-12">
                        <!-- Submit button -->
                        <button data-mdb-ripple-init type="submit" class="btn btn-success btn-block mt-4 ">Ajukan Pembayaran</button>
                    </div>
                </div>
                </form>
            </div>
@endsection
