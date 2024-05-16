@extends('admin.main-layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
<h2 class="text-center" style="margin-top:2rem; font-family: 'Quicksand', sans-serif;">Form Tambah Pinjaman</h2>

<div class="container hidden">
    <form class="user mt-5" action="{{ route('registration') }}" method="post">
      @csrf
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <label class="form-label" for="">Username</label>
              <div data-mdb-input-init class="form-outline">
                <input type="text" id="nama" name="username" class="form-control mt-2" required value="{{ old('nama') }}"/>
              </div>
              @error('nama')
              <div class="alert alert-danger">
                {{ $message }}
              </div>    
              @enderror
            </div>
            <div class="col">
                <label class="form-label" name="jumlah_angsuran" for="">Jumlah Angsuran</label>
                <div data-mdb-input-init class="form-outline">
                    <input type="number" class="form-control" id="angsur" name="telepon"
                    value="{{ old('jumlah_angsuran') }}" placeholder="Masukan Jumlah Angsuran..." required >
                </div>
            </div>
          </div>
          <div class="row">
          <div class="col-lg-6 md-12 mt-2">
            <div data-mdb-input-init class="form-outline">
              <label class="form-label" for="form1">Jumlah Pinjaman</label>
              <select id="jmlh-pinjaman" name="jumlah_pinjaman" class="form-select form-select-lg mb-1" 
              aria-label=".form-select-lg example value="{{ old('pinjaman') }}"">
                <option value="500000">Rp. 500.000</option>
                <option value="1000000">Rp. 1.000.000</option>
                <option value="1500000">Rp. 1.500.000</option>
                <option value="2000000">Rp. 2.000.000</option>
                <option value="2500000">Rp. 2.500.000</option>
                <option value="3000000">Rp. 3.000.000</option>
                <option value="3500000">Rp. 3.500.000</option>
                <option value="4000000">Rp. 4.000.000</option>
                <option value="4500000">Rp. 4.500.000</option>
                <option value="5000000">Rp. 5.000.000</option>
                <option value="5500000">Rp. 5.500.000</option>
                <option value="6000000">Rp. 6.000.000</option>
                <option value="6500000">Rp. 6.500.000</option>
                <option value="7000000">Rp. 7.000.000</option>
                <option value="7500000">Rp. 7.500.000</option>
                <option value="8000000">Rp. 8.000.000</option>
                <option value="8500000">Rp. 8.500.000</option>
                <option value="9000000">Rp. 9.000.000</option>
                <option value="9500000">Rp. 9.500.000</option>
                <option value="10000000">Rp. 10.000.000</option>
              </select>
            </div>
          </div>
            <div class="row">
                <div class="col-12">
                        <!-- Submit button -->
                        <button data-mdb-ripple-init type="submit" class="btn btn-success btn-block mt-4 ">Ajukan Pinjaman</button>
                    </div>
                </div>
                </form>
            </div>
@endsection
