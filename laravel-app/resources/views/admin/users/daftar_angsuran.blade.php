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
        <a href="angsuran/create" class="btn btn-primary">Tambah Angsuran</a>
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
                    <th>Angsuran Ke-</th>
                    {{-- <th>Sisa Angsuran</th> --}}
                    <th>Jumlah Angsuran / Bulan</th>
                    <th>Bukti Bayar</th>
                    <th>Tanggal Angsur</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($installment as $i)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $i-> user -> customer -> nama }}</td>
                    <td>{{ $i -> angsuran_ke }}</td>
                    {{-- <td>
                        @php 
                        $latestInstallment = $i->user->latestLoan
                        @endphp
                        @if($latestInstallment)
                        @php 
                            $angsuran = $latestInstallment->jumlah_angsuran;
                            echo $angsuran
                        @endphp
                        @endif
                    </td> --}}
                    <td>Rp 
                        @php
                        $latestLoan = $i->user->latestLoan;
                        @endphp
                        @if($latestLoan)
                        @php
                            $pinjaman = $latestLoan->biaya_angsuran;
                            echo number_format($pinjaman, 0, '.', '.');
                        @endphp
                    @else
                        <p>No loans available</p>
                    @endif                    
                    </td>    
                    <td> </td>
                    <td>{{ $i -> created_at }}</td>

                    {{-- <td>{{ $l -> user -> customer -> status_pemabayaran = 1? 'lancar' : 'macet' }}</td> --}}
                    <td>
                        <form action="/admin/angsuran/{{$i->id}}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Hapus Data Pengajuan ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </form>
        
                    <form action="{{ route('toggleReturn', $i->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        <button class="btn btn-success btn-circle btn-sm"
                         onclick="return confirm ('Kembalikan status pengajuan?')">
                            <i class="fas fa-check"></i>
                        </button>
                    </form>                      
                </td>
                </tr>
            @endforeach
            </tbody>
        </div> 
</div>
@endsection