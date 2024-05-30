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
<!-- /.content-header -->
@endsection

@section('body')
<a href="/admin/customers" class="fa fa-arrow-left"></a>
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid">
            Profil Nasabah
        </div>
    </div>
    <div class="container ml-3">    
    <div class="row">
            <div class="col-3">
            <h2 class="h2 mt-3">{{ $user -> username }}</h2>
            @if($user->image)
            <img src="{{ asset('storage/' . $user->image) }}"
            style="width: 240px; border-radius: 100%; height:220px;" class="mt-3">
            @else 
            <img src="{{ asset('admin_assets/img/undraw_profile.svg')}}"
            style="width: 240px; border-radius: 100%; height:220px;" class="mt-3">
            @endif
            </div>
        <div class="col-8 mt-3 ml-5">
            <ul class="list-unstyled ml-3">
                <li class="mt-5 text-lg">Nama: {{ $user -> customer -> nama }}</li>
                <li class="mt-3 text-lg">Alamat: {{ $user -> customer -> alamat }}</li>
                <li class="mt-3 text-lg">No. Telepon: 0{{ $user -> customer -> telepon }}</li>
                <li class="mt-3 text-lg">Email: {{ $user -> email }}</li>
                <li class="mt-3 text-lg">Status Kepegawaian: {{ $user -> customer -> employment -> status_kepegawaian }}</li>
                <li class="mt-3 text-lg">Pendapatan per Bulan: Rp 
                    @php
                    $pendapatan = $user -> customer -> pendapatan;
                     echo $pendapatan
                    @endphp 
                </li>
                <li class="mt-3 text-lg">Keperluan Meminjam: {{ $user -> customer -> alasan }}</li>
                <li class="mt-3 text-lg">Berkas Jaminan: {{ $user -> customer -> kelengkapan_berkas }}</li>

            </ul>
        </div>
    </div>
    </div>
        
    </div>
    <!-- /.row (main row) -->
    @endsection