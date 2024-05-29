@extends('admin.main-layout')
 
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
<div class="row">
    <div class="container-fluid">
        Daftar Nasabah
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success ml-4 mt-2" role="alert">
        {{ session('success') }}
    </div>  
    @endif

    <div class="container table-responsive">
        <table id="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No.Telepon</th>
                    <th>Pinjaman</th>
                    <th>Lama Angsuran</th>
                    <th>Skor</th>
                    {{-- <th>Jatuh Tempo</th> --}}
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c -> customer -> nama}}</td>
                    <td>{{ $c  -> customer -> telepon }}</td>
                    <td>Rp
                        @php
                        $pinjaman = $c -> customer -> pinjaman;
                         echo number_format($pinjaman,'0','.','.')
                        @endphp 
                    </td>
                    <td>
                        @php 
                        $latestLoan = $c->latestLoan
                        @endphp
                        @if($latestLoan)
                        @php 
                            $angsuran = $latestLoan->jumlah_angsuran;
                            echo $angsuran
                        @endphp
                        @endif
                    Bulan
                    </td>    
                    <td>{{ $c -> customer -> skor }} </td>    
                    {{-- <td>
                        @foreach ($c->loan as $loan)
                        {{ $loan->jatuh_tempo }}
                        @endforeach
                    </td>  --}}
                    <td>
                        <form action="{{ route('destroy.submission', $c) }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                            <button class="btn btn-danger btn-circle btn-sm"
                             onclick="return confirm ('Hapus Data Pengajuan ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </form>
        
                    <form action="{{ route('toggleReturn', $c->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        <button class="btn btn-warning btn-circle btn-sm"
                         onclick="return confirm ('Kembalikan status pengajuan?')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </form>        
        
                    <form action="{{ route('registration.post', $c->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('POST') 
                        <button class="btn btn-success btn-circle btn-sm mt-1"
                         onclick="return confirm ('Lakukan Registrasi Nasabah?')">
                            <i class="fas fa-plus"></i>
                        </button>
                    </form>                
                </td>
                </tr>
            @endforeach
            </tbody>
        </div> 
</div>
@endsection