@extends('layouts.main')

@section ('body')
    <h2 class="text-center" style="margin-top:7rem; font-family: 'Quicksand', sans-serif;">Formulir Pengajuan Pinjaman</h2>

    <div class="container hidden">
      <form class="user mt-5" action="{{ route('submission') }}" method="post">
        @csrf
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
              <div class="col">
                <label class="form-label" for="">Nama Lengkap</label>
                <div data-mdb-input-init class="form-outline">
                  <input type="text" id="nama" name="nama" class="form-control mt-2" />
                </div>
              </div>
              <div class="col">
                <label class="form-label" name="jenis_kelamin" for="">Jenis Kelamin</label>
                <div data-mdb-input-init class="form-outline">
                  <select id="jenis_kelamin" name="jenis_kelamin" class="form-select form-select-lg" aria-label=".form-select-lg example">
                      <option selected value="Laki-Laki">Laki-Laki </option>
                      <option value="Perempuan"> Perempuan </option>
                  </select>
              </div>
            </div>

              <!-- Text input -->
              <div data-mdb-input-init class="form-outline mt-3">
                <label class="form-label" for="form6Example4">Alamat Lengkap</label>
                <input type="text" id="nama" name="alamat" class="form-control mt-2" />
              </div>

              <div class="col mt-3">
                <label class="form-label" for="form1">Keperluan Meminjam</label>
                  <div data-mdb-input-init class="form-outline">
                    <select name="keperluan_meminjam" id="keperluan" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
                        <option value="Medis">Medis</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Rekreasi">Rekreasi</option>
                        <option value="Rumah">Rumah</option>
                        <option value="Usaha">Usaha</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                  </div>
            <!-- Text input -->
          <div class="row mt-3">
              <div class="col-lg-6">
                <label class="form-label" for="">Nomor Telepon</label>
                <div class="input-group">
                  <span class="input-group-text">+62</span>
                  <input type="number" class="form-control" id="phone" name="telepon" placeholder="Enter phone number" >
                </div>
                  <small id="nomor_telepon" class="form-text text-muted">Format: +62 813XXXXX</small>
              </div>
      
            <!-- Selection Input -->
            <div class="col-lg-6">
                <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="form6Example2">Status Kepegawaian</label>
                  <select id="stat_kepegawaian" name="status_kepegawaian" class="form-select form-select-lg mb-1" aria-label=".form-select-lg ">
                    <option value="2">Kontrak</option>
                    <option value="4">Pegawai</option>
                    <option value="5">Sales Asisten</option>
                    <option value="6">Operator</option>
                    <option value="6">Satpam</option>
                    <option value="8">Kepala Regu</option>
                    <option value="8">Staff</option>
                    <option value="9">Manajer</option>  
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
                    <select id="pendapatan" name="pendapatan" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
                        <option selected value = "1"> < Rp. 2.000.000</option>
                        <option value="2"> Rp 2.000.000 - 3.000.000 </option>
                        <option value="3"> Rp 3.000.000 - 4.000.000 </option>
                        <option value="4"> Rp 4.000.000 - 5.000.000</option>
                        <option value="5"> Rp 5.000.000 - 6.000.000 </option>
                        <option value="6"> Rp 7.500.000 - 8.000.000 </option>
                        <option value="7"> Rp 8.000.000 - 9.000.000 </option>
                        <option value="8"> Rp 9.000.000 - 10.000.000 </option>
                        <option value="9"> > Rp 10.000.000 </option>
                    </select>
                  </div>
                </div>
            </div>
          
            <!-- Message input -->
            <div class="col-6 mt-2">
              <div data-mdb-input-init class="form-outline">
                <label class="form-label" for="form1">Jumlah Angsuran</label>
                <select id="lama-angsuran" name="angsuran" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
                  <option value="1">1 Bulan</option>
                  <option value="2">2 Bulan</option>
                  <option value="3">3 Bulan</option>
                  <option value="4">4 Bulan</option>
                  <option value="5">5 Bulan</option>
                  <option value="6">6 Bulan</option>
                  <option value="7">7 Bulan</option>
                  <option value="8">8 Bulan</option>
                </select>
              </div>
            </div>
              <div class="col mt-2">
                <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="form1">Jumlah Pinjaman</label>
                  <select id="jmlh-pinjaman" name="pinjaman" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
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
            <div class="mt-3 mb-3">
              <label class="form-label" for="form1">Jaminan</label>
            <select class="selectpicker col-lg-12" name="jaminan[]" multiple id="jaminan" data-placeholder="Choose anything" multiple>
                <option>KTP</option>
                <option>Kartu Keluarga</option>
                <option>Ijazah</option>
                <option>Buku Tabungan</option>
                <option>BPKB</option>
                <option>Asuransi</option>
                <option>Buku Nikah</option>
            </select>
          </div>
            <!-- Submit button -->
            <button data-mdb-ripple-init type="submit" class="btn btn-success btn-block mb-4 ">Ajukan Pinjaman</button>
            </div>
          </form>
    </div>
   
@endsection