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
    <!-- Main row -->
    <div class="row">
        <div class="container-fluid ">
           <h4 class="h4 mt-3">Data Pengajuan Pinjaman</h4>
        </div>
        <div class="container table-responsive mt-3">
            <table  id="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">Keperluan Meminjam</th>
                    <th scope="col">Status Kepegawaian</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Jumlah Pinjaman</th>
                    <th scope="col">Angsuran</th>
                    <th scope="col">Skor </th>
                    <th scope="col">Waktu Pengajuan</th>
                    <th scope="col">Tindakan</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($submission as $c)
                <tr>
                    <td>{{ $c ["nama"] }}</td>
                    <td>{{ $c ["keperluan_meminjam"] }}</td>
                    <td class="text-center">{{ $c ["status_kepegawaian"] }}</td>
                    <td>{{ $c['pendapatan'] }}</td>
                    <td>{{ $c['jumlah_pinjaman'] }}</td>
                    <td>{{ $c['lama_angsuran'] }} Bulan</td>
                    <td>{{ $c['skor']}}</td>
                    <td>{{ $c['created_at']}}</td>
                    <td>
                    <form action="{{ route('destroy', $c) }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                        <button class="btn btn-danger btn-circle btn-sm"
                         onclick="return confirm ('Hapus Data Pengajuan ini?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                    <form action="{{ route('toggleStatus', $c->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('patch')
                        <button class="btn btn-success btn-circle btn-sm"
                         onclick="return confirm ('Validasi data pengajuan?')">
                            <i class="fas fa-check"></i>
                        </button>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<div class="container">
    <h4 class="h4 mt-3">Data Tervalidasi</h4>
    <div class="table-responsive mt-3">
        <table id="example" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">No. Telepon</th>
                <th scope="col">Jumlah Pinjaman</th>
                <th scope="col">Lama Angsuran</th>
                <th scope="col">Jaminan</th>
                <th scope="col">Skor</th>
                <th scope="col">Tindakan</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($validated as $a)
            <tr>
                <td>{{ $a ["nama"] }}</td>
                <td>{{ $a ["telepon"] }}</td>
                <td>{{ $a['jumlah_pinjaman'] }}</td>
                <td>{{ $a['lama_angsuran'] }} Bulan</td>
                <td>{{ $a['kelengkapan_berkas'] }} </td>
                <td>{{ $a['skor'] }}</td>
                <td>
                <form action="{{ route('destroy', $a) }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                    <button class="btn btn-danger btn-circle btn-sm"
                     onclick="return confirm ('Hapus Data Pengajuan ini?')">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </form>

            <form action="{{ route('toggleReturn', $a->id) }}" method="post" class="d-inline">
                @csrf
                @method('patch')
                <button class="btn btn-warning btn-circle btn-sm"
                 onclick="return confirm ('Kembalikan status pengajuan?')">
                    <i class="fas fa-backward"></i>
                </button>
            </form>        

            <form action="{{ route('registration.post', $a->id) }}" method="post" class="d-inline">
                @csrf
                @method('POST') 
                <button class="btn btn-success btn-circle btn-sm mt-1"
                 onclick="return confirm ('Lakukan Registrasi Nasabah?')">
                    <i class="fas fa-edit"></i>
                </button>
            </form>                
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>  
    <!-- /.row (main row) -->
    @endsection
    