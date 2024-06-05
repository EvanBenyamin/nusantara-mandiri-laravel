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
<h2 class="text-center" style="margin-top:2rem; font-family: 'Quicksand', sans-serif;">Formulir Registrasi Customer</h2>

<div class="container hidden">
    <form class="user mt-5" action="{{ route('registration.send',$submission->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('POST') 
          <!-- 2 column grid layout with text inputs for the first and last names -->
          <div class="row mb-4">
            <div class="col">
              <label class="form-label" for="">Nama Lengkap</label>
              <div data-mdb-input-init class="form-outline">
                <input type="text" id="nama" name="nama" class="form-control mt-2" required value="{{  old('nama',$submission->nama) }}"/>
              </div>
              @error('nama')
              <div class="alert alert-danger">
                {{ $message }}
              </div>    
              @enderror
            </div>
            <div class="col">
                <label class="form-label" name="jenis_kelamin" for="">Jenis Kelamin</label>
                <div data-mdb-input-init class="form-outline">
                  <select id="jenis_kelamin" name="jenis_kelamin" class="form-select form-select-lg"
                   aria-label=".form-select-lg example value="{{  old('jenis_kelamin') }}">
                      <option selected value="Laki-Laki"{{ old('jenis_kelamin', $submission->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki </option>
                      <option value="Perempuan"{{ old('jenis_kelamin', $submission->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}> Perempuan </option>
                  </select>
              </div>
            </div>
                          <!-- Text input -->
                          <div class="row">
                            <div data-mdb-input-init class=" col-lg-6 md-12 form-outline mt-3">
                              <label class="form-label" for="form6Example4">Alamat Lengkap</label>
                              <input type="text" id="nama" name="alamat" class="form-control mt-2"
                               required value="{{ old('alamat',$submission->alamat) }}" />
                            </div>
                            <div class="col-lg-6 mt-3">
                                <label class="form-label" for="form1">Keperluan Meminjam</label>
                                  <div data-mdb-input-init class="form-outline">
                                    <select name="keperluan_meminjam" id="keperluan" 
                                    class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
                                        <option value="Medis"{{ old('keperluan_meminjam', $submission->keperluan_meminjam) == 'Medis' ? 'selected' : '' }}>Medis</option>
                                        <option value="Pendidikan"{{ old('keperluan_meminjam', $submission->keperluan_meminjam) == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                                        <option value="Rekreasi"{{ old('keperluan_meminjam', $submission->keperluan_meminjam) == 'Rekreasi' ? 'selected' : '' }}>Rekreasi</option>
                                        <option value="Rumah"{{ old('keperluan_meminjam', $submission->keperluan_meminjam) == 'Rumah' ? 'selected' : '' }}>Rumah</option>
                                        <option value="Usaha"{{ old('keperluan_meminjam', $submission->keperluan_meminjam) == 'Usaha' ? 'selected' : '' }}>Usaha</option>
                                        <option value="Lainnya"{{ old('keperluan_meminjam', $submission->keperluan_meminjam) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                    </select>
                                  </div>
                            </div>  
                  
                          <!-- Text input -->
                        <div class="row mt-3">
                            <div class="col-lg-6">
                              <label class="form-label" for="">Nomor Telepon</label>
                              <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input type="number" class="form-control" id="phone" name="telepon"
                                value="{{ old('telepon',$submission->telepon) }}" placeholder="Enter phone number" required >
                              </div>
                                <small id="nomor_telepon" class="form-text text-muted">Format: +62 813XXXXX</small>
                                @error('telepon')
                                <div class="alert alert-danger row col-6">
                                  {{ $message }}
                                </div>    
                                @enderror
                                
                            </div>
                          <!-- Selection Input -->
                          <div class="col-lg-6">
                              <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="form6Example2">Status Kepegawaian</label>
                                <select id="stat_kepegawaian" name="id_kepegawaian" class="form-select 
                                form-select-lg mb-1" aria-label=".form-select-lg">
                                  <option value="2"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '2' ? 'selected' : '' }}>Kontrak</option>
                                  <option value="3"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '3' ? 'selected' : '' }}>Satpam</option>
                                  <option value="4"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '4' ? 'selected' : '' }}>Pegawai</option>
                                  <option value="5"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '5' ? 'selected' : '' }}>Operator</option>
                                  <option value="6"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '6' ? 'selected' : '' }}>Sales Asisten</option>
                                  <option value="7"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '7' ? 'selected' : '' }}>Staff</option>
                                  <option value="8"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '8' ? 'selected' : '' }}>Kepala Regu</option>
                                  <option value="9"{{ old('status_kepegawaian', $submission->status_kepegawaian) == '9' ? 'selected' : '' }}>Manajer</option>  
                              </select>
                              </div>
                            </div>
                        </div>
                          
                          
                          <!-- Number input -->
                        <div class="row">
                          <div data-mdb-input-init class="form-outline mb-4">
                            <div class="col mt-3">
                              <label class="form-label" for="form1">Pendapatan per Bulan</label>
                                <div data-mdb-input-init class="form-outline">
                                  <select id="pendapatan" name="pendapatan" class="form-select form-select-lg mb-1" 
                                  aria-label=".form-select-lg example" value="{{ old('pendapatan') }}">
                                    <option selected value = "<2000000"{{ old('pendapatan', $submission->pendapatan) == '<2000000' ? 'selected' : '' }}>< Rp. 2.000.000</option>
                                    <option value="2000000 - 3000000"{{ old('pendapatan', $submission->pendapatan) == '2000000 - 3000000' ? 'selected' : '' }}> Rp 2.000.000 - 3.000.000 </option>
                                    <option value="3000000 - 4000000"{{ old('pendapatan', $submission->pendapatan) == '3000000 - 4000000' ? 'selected' : ''}}> Rp 3.000.000 - 4.000.000 </option>
                                    <option value="4000000 - 5000000"{{ old('pendapatan', $submission->pendapatan) == '4000000 - 5000000' ? 'selected' : ''}}> Rp 4.000.000 - 5.000.000</option>
                                    <option value="5000000 - 6000000"{{ old('pendapatan', $submission->pendapatan) == '5000000 - 6000000' ? 'selected' : ''}}> Rp 5.000.000 - 6.000.000 </option>
                                    <option value="7000000 - 8000000"{{ old('pendapatan', $submission->pendapatan) == '7000000 - 8000000' ? 'selected' : ''}}> Rp 7.000.000 - 8.000.000 </option>
                                    <option value="8000000 - 9000000"{{ old('pendapatan', $submission->pendapatan) == '8000000 - 9000000' ? 'selected' : ''}}> Rp 8.000.000 - 9.000.000 </option>
                                    <option value="9000000 - 10000000"{{ old('pendapatan', $submission->pendapatan) == '9000000 - 10000000' ? 'selected' : ''}}> Rp 9.000.000 - 10.000.000 </option>
                                    <option value=">10000000"{{ old('pendapatan', $submission->pendapatan) == '>10000000' ? 'selected' : ''}}> > Rp 10.000.000 </option>
                                  </select>
                                </div>
                              </div>
                          </div>
                        
                          <!-- Message input -->
                          <div class="col-lg-6 md-12 mt-2">
                            <div data-mdb-input-init class="form-outline">
                              <label class="form-label" for="form1">Jumlah Angsuran</label>
                              <select id="lama-angsuran" name="lama_angsuran" class="form-select form-select-lg mb-1" 
                              aria-label=".form-select-lg example">
                                <option value="1"{{ old('angsuran', $submission->lama_angsuran) == '1' ? 'selected' : '' }}>1 Bulan</option>
                                <option value="2"{{ old('angsuran', $submission->lama_angsuran) == '2' ? 'selected' : '' }}>2 Bulan</option>
                                <option value="3"{{ old('angsuran', $submission->lama_angsuran) == '3' ? 'selected' : '' }}>3 Bulan</option>
                                <option value="4"{{ old('angsuran', $submission->lama_angsuran) == '4' ? 'selected' : '' }}>4 Bulan</option>
                                <option value="5"{{ old('angsuran', $submission->lama_angsuran) == '5' ? 'selected' : '' }}>5 Bulan</option>
                                <option value="6"{{ old('angsuran', $submission->lama_angsuran) == '6' ? 'selected' : '' }}>6 Bulan</option>
                                <option value="7"{{ old('angsuran', $submission->lama_angsuran) == '7' ? 'selected' : '' }}>7 Bulan</option>
                                <option value="8"{{ old('angsuran', $submission->lama_angsuran) == '8' ? 'selected' : '' }}>8 Bulan</option>
                              </select>
                            </div>
                          </div>
                            <div class="col-lg-6 md-12 mt-2">
                              <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="form1">Jumlah Pinjaman</label>
                                <select id="jmlh-pinjaman" name="jumlah_pinjaman" class="form-select form-select-lg mb-1" 
                                aria-label=".form-select-lg example value="{{ old('pinjaman') }}"">
                                  <option value="500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '500000' ? 'selected' : '' }}>Rp. 500.000</option>
                                  <option value="1000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '1000000' ? 'selected' : '' }}>Rp. 1.000.000</option>
                                  <option value="1500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '1500000' ? 'selected' : '' }}>Rp. 1.500.000</option>
                                  <option value="2000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '2000000' ? 'selected' : '' }}>Rp. 2.000.000</option>
                                  <option value="2500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '2500000' ? 'selected' : '' }}>Rp. 2.500.000</option>
                                  <option value="3000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '3000000' ? 'selected' : '' }}>Rp. 3.000.000</option>
                                  <option value="3500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '3500000' ? 'selected' : '' }}>Rp. 3.500.000</option>
                                  <option value="4000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '4000000' ? 'selected' : '' }}>Rp. 4.000.000</option>
                                  <option value="4500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '4500000' ? 'selected' : '' }}>Rp. 4.500.000</option>
                                  <option value="5000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '5000000' ? 'selected' : '' }}>Rp. 5.000.000</option>
                                  <option value="5500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '5500000' ? 'selected' : '' }}>Rp. 5.500.000</option>
                                  <option value="6000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '6000000' ? 'selected' : '' }}>Rp. 6.000.000</option>
                                  <option value="6500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '6500000' ? 'selected' : '' }}>Rp. 6.500.000</option>
                                  <option value="7000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '7000000' ? 'selected' : '' }}>Rp. 7.000.000</option>
                                  <option value="7500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '7500000' ? 'selected' : '' }}>Rp. 7.500.000</option>
                                  <option value="8000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '8000000' ? 'selected' : '' }}>Rp. 8.000.000</option>
                                  <option value="8500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '8500000' ? 'selected' : '' }}>Rp. 8.500.000</option>
                                  <option value="9000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '9000000' ? 'selected' : '' }}>Rp. 9.000.000</option>
                                  <option value="9500000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '9500000' ? 'selected' : '' }}>Rp. 9.500.000</option>
                                  <option value="10000000"{{ old('pinjaman', $submission->jumlah_pinjaman) == '1000000' ? 'selected' : '' }}>Rp. 10.000.000</option>
                                </select>
                              </div>
                            </div>
                          <div class="mt-3 mb-3">
                            <label class="form-label" for="form1">Jaminan</label>
                          <select class="selectpicker col-lg-12" name="kelengkapan_berkas[]" multiple id="jaminan" 
                          data-placeholder="Choose anything" multiple required value="{{ old('kelengkapan_berkas[]') }}">
                              <option value="Surat Tanah">Surat Tanah</option>
                              <option value="Kartu Keluarga">Kartu Keluarga</option>
                              <option value="Ijazah">Ijazah</option>
                              <option value="Buku Tabungan">Buku Tabungan</option>
                              <option value= "BPKB">BPKB</option>
                              <option value="Asuransi">Asuransi</option>
                              <option value="Buku Nikah">Buku Nikah</option>
                          </select>
                        </div>
                    <h2 class="text-center" style="margin-top:2rem; font-family: 'Quicksand', sans-serif;">Registrasi User</h2>
                    <div class="row mb-4">
                        <div class="col-6">
                        <label class="form-label" for="">Username</label>
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="username" name="username" class="form-control mt-1" required value="{{ old('nama') }}"/>
                        </div>
                    </div>
                        <div data-mdb-input-init class="col-lg-6 md-12 form-outline mt-1">
                            <label class="form-label" for="form6Example4">Email</label>
                            <input type="text" id="nama" name="email" class="form-control" required
                            value="{{ old('email',$submission->email) }}" />
                            @error('email')
                            <div class="alert alert-danger">
                              {{ $message }}
                            </div>    
                            @enderror
                          </div>

                        </div>  
                    </div>
                    <div class="row mb-4">
                        <div class="col-6">
                        <label class="form-label" for="">Password</label>
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="password" name="password" class="form-control mt-1" required value="{{ old('nama') }}"/>
                        </div> 
                      </div>     
                        <div class="col-6">
                              <label for="image" class="form-label">Foto Nasabah</label>
                              <input class="form-control form-control-lg" name="image" id="image" type="file">
                            </div>
                        </div>
                    </div>
                        <!-- Submit button -->
                        <button data-mdb-ripple-init type="submit" class="btn btn-success btn-block mt-4 ">Registrasi Customer</button>
                    </div>
                </form>
            </div>
@endsection