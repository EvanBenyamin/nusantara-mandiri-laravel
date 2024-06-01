@extends('admin.customers.main-layout')
 
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
<h2 class="text-center" style="margin-top:2rem; font-family: 'Quicksand', sans-serif;">Data Pembayaran {{ auth()->user()->customer->nama }}</h2>
<div class="row">
    @if(session()->has('success'))
    <div class="alert alert-success ml-4 mt-2" role="alert">
        {{ session('success') }}
    </div>      
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger ml-4 mt-2" role="alert">
        {{ session('error') }}
    </div>      
    @endif
    <div class="container table-responsive">
        <table id="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Angsuran ke-</th>
                    <th>Waktu Pembayaran</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Bukti Pembayaran</th>
                    <th>Status Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $p)
            <tr>
                <td>{{ $loop -> iteration }}</td>
                <td>{{ $p -> angsuran_ke }}</td>
                <td>{{ $p->created_at }}</td>
                <td>Rp
                    @php 
                    $payment = $p->pembayaran;
                    echo number_format($payment,0,'.','.');
                    @endphp
                </td>
                <td>
                    @if($p->image)
                    <img src="{{ asset('storage/' . $p->image) }}"
                    style="width: 200px; height:250px;" class="mt-3">
                    @else 
                    echo 'Tidak Ada Bukti Bayar!';
                    @endif
                    </div>
                </td>
                <td>
                    @if(is_null($p->status))
                    <a class="btn btn-warning btn-icon-split tabindex="-1 role="button" aria-disabled="true">
                        <span class="icon text-white-50">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="text">Pending</span>
                    </a>
                    @elseif($p->status == 0)
                    <a class="btn btn-danger btn-icon-split tabindex="-1 role="button" aria-disabled="true">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text">Ditolak</span>
                    </a>
                    @else 
                    <a class="btn btn-success btn-icon-split tabindex="-1 role="button" aria-disabled="true">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Diterima</span>
                    </a>
                    @endif
                </td>
            </tr>
                @endforeach
        </div>  
</div>

@endsection