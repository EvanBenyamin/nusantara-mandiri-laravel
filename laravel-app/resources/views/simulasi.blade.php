@extends('layouts.main')
@section('body')

<h2 class="text-center" style="margin-top:7rem; font-family: 'Quicksand', sans-serif;">Simulasi Pengajuan Pinjaman</h2>
<div class="container hidden">
    <div id="pinjaman" class="">
        <form action="" method="post" class="mt-5">
        <div class="row mb-4">
            <div class="col">
            <label class="form-label" for="form1">Keperluan Meminjam</label>
              <div data-mdb-input-init class="form-outline">
                <select id="keperluan" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
                    <option value="9">Medis</option>
                    <option value="7">Pendidikan</option>
                    <option value="6">Rekreasi</option>
                    <option value="8">Rumah</option>
                    <option value="10">Usaha</option>
                    <option value="5">Lainnya</option>
                </select>
              </div>
            </div>        
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <label class="form-label" for="form1">Status Kepegawaian</label>  
                    <select id="stat_kepegawaian" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
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
        <div class="row mb-4">
            <div class="col-12 mt-3">
            <label class="form-label" for="form1">Pendapatan per Bulan</label>
              <div data-mdb-input-init class="form-outline">
                <select id="pendapatan" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
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
            <div class="col mt-3">
                <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="form1">Jumlah Angsuran</label>
                  <select id="lama-angsuran" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
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
            <div class="col mt-3">
                <div data-mdb-input-init class="form-outline">
                  <label class="form-label" for="form1">Jumlah Pinjaman</label>
                  <select id="jmlh-pinjaman" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
                    <option value="1">Rp. 500.000</option>
                    <option value="1">Rp. 1.000.000</option>
                    <option value="2">Rp. 1.500.000</option>
                    <option value="2">Rp. 2.000.000</option>
                    <option value="3">Rp. 2.500.000</option>
                    <option value="3">Rp. 3.000.000</option>
                    <option value="4">Rp. 3.500.000</option>
                    <option value="4">Rp. 4.000.000</option>
                    <option value="5">Rp. 4.500.000</option>
                    <option value="5">Rp. 5.000.000</option>
                    <option value="6">Rp. 5.500.000</option>
                    <option value="6">Rp. 6.000.000</option>
                    <option value="7">Rp. 6.500.000</option>
                    <option value="7">Rp. 7.000.000</option>
                    <option value="8">Rp. 7.500.000</option>
                    <option value="8">Rp. 8.000.000</option>
                    <option value="9">Rp. 8.500.000</option>
                    <option value="9">Rp. 9.000.000</option>
                    <option value="10">Rp. 9.500.000</option>
                    <option value="10">Rp. 10.000.000</option>
                  </select>
                </div>
              </div>
              <div class="row mt-2">
              <div class="col-6 mt-2" >jaminan</div>
              </div>
              <div class="row">
              <div class="form-check col mt-3 ">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Surat Tanah
                </label>
              </div>
              <div class="form-check col mt-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Buku Tabungan
                </label>
              </div>
              <div class="form-check col mt-3">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Buku Nikah
                </label>
              </div>
            </div>
            <div class="row">
              <div class="form-check col-4">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Kartu Keluarga
                </label>
              </div>
              <div class="form-check col">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Ijazah
                </label>
              </div>
              <div class="form-check col">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Asuransi
                </label>
              </div>
            </div>
          </div>
          <div class="d-grid gap-2">
            <button id="simulasi-pinjaman" type="button" class="btn btn-success btn-block mb-4">Simulasi Kelayakan Pinjaman</button>
            </div>   
        </form>

      <div class="result mt-3 text-center" style="height :15vh;">
          <h3 class="h3" id="simResult" style="font-family: "IBM Plex Serif", serif;"></h3>
      </div>
    </div>

    <div id="cicilan" class="col">
        <h2 class="text-center" style="margin-top:1rem; font-family: 'Quicksand', sans-serif;">Simulasi Cicilan Pinjaman</h2>
        <div class="container">
            <form class="mt-3">
        <label class="form-label mb-1" for="">Pilih Plafond</label>
        <div data-mdb-input-init class="form-outline">
            <select id="plafond" class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
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
        <div data-mdb-input-init class="form-outline mt-3">
        <label class="form-label mb-2" style="" for="">Pilih Banyak Angsuran</label>
            <select id="angsur" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
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
        <div class="d-grid gap-2">
        <button id="simulasi-cicilan" type="button" class="btn btn-success btn-block mb-4">Hitung Simulasi Cicilan</button>
        </div>        
    </div>
    <div class="result mt-3 text-center" style="height : 30vh;">
        <h3 class="h3" id="result" style="font-family: "IBM Plex Serif", serif;"></h3>
    </div>
    <script src="/assets/simulasi.js"></script>     
@endsection
