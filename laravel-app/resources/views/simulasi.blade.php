@extends('layouts.main')
@section('body')

<div class="container hidden">
    <div class="col">
        <h2 class="text-center" style="margin-top:7rem; font-family: 'Quicksand', sans-serif;">Simulasi Cicilan Pinjaman</h2>

        <div class="container">
            <form class="mt-5">
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
          <label class="form-label mb-1" for="">Pilih Plafond</label>
        </div>
        <div data-mdb-input-init class="form-outline">
            <select id="angsur" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option value="1">1 Kali</option>
                <option value="2">2 Kali</option>
                <option value="3">3 Kali</option>
                <option value="4">4 Kali</option>
                <option value="5">5 Kali</option>
                <option value="6">6 Kali</option>
                <option value="7">7 Kali</option>
                <option value="8">8 Kali</option>
            </select>
          <label class="form-label mb-2" style="" for="">Pilih Banyak Angsuran</label>
        </div>
        <div class="d-grid gap-2">
        <button id="simulasi" type="button" class="btn btn-success btn-block mb-4">Hitung Simulasi Cicilan</button>
        </div>        
    </div>
    <div class="result mt-3 text-center" style="height : 30vh;">
        <h3 class="h3" id="result" style="font-family: "IBM Plex Serif", serif;"></h3>
    </div>
    <script src="/assets/simulasi.js"></script>     
@endsection
