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
<!-- /.content-header -->
@endsection
@section('body')
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            Dashboard
        </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Jumlah Pinjaman Terakhir </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    Rp 
                                    @php
                                    $pinjaman = auth()->user()->latestLoan->pinjaman;
                                    echo number_format($pinjaman,0,'.','.');
                                    @endphp
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Sisa Angsuran (Bulan)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                                    @if (auth()->user()->latestLoan->jumlah_angsuran > 0)
                                    {{ auth()->user()->latestLoan->jumlah_angsuran}}
                                    @else
                                    {{ 'Lunas' }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tasks Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Banyak Pinjaman</div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $loan->count() }}
                                            Kali
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container table-responsive">
                <h2 class="text-center" style="margin-top:2rem; font-family: 'Quicksand', sans-serif;">Data Pinjaman Terakhir</h2>
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
                <table id="data-user" class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jumlah Pinjaman</th>
                            <th>Sisa Angsuran</th>
                            <th>Jatuh Tempo</th>
                            <th>Biaya Angsuran / Bulan</th>
                            <th>Status Pinjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                    <td>Rp
                        @php
                        $loan = auth()->user()->latestLoan->pinjaman;
                        echo number_format($loan,0,'.','.')
                        @endphp
                    </td>
                    <td>
                        @if(auth()->user()->latestLoan->jumlah_angsuran > 0)
                        @php
                        echo auth()->user()->latestLoan->jumlah_angsuran;
                        echo ' Bulan'; 
                        @endphp
                        @else
                        {{ 'Lunas' }}
                        @endif
                    </td>
                    <td>{{ auth()->user()->latestLoan->jatuh_tempo }}</td>
                    <td>Rp 
                        @php
                        $biaya = auth()->user()->latestLoan->biaya_angsuran;
                        echo number_format($biaya,0,'.','.')
                        @endphp
                    </td>
                    <td>
                        @php
                        use Carbon\Carbon;
                        $currentDate = Carbon::now();
                        @endphp
                        @if (auth()->user()->latestLoan->jatuh_tempo < $currentDate && 
                            auth()->user()->latestLoan->jumlah_angsuran > 0) 
                            <span style="color: red;">Macet</span>
                        @else
                        <span class="text-success">Lancar</span>
                        @endif
                    </td>

@endsection