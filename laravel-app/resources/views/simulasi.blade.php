@extends('layouts.main')
@section('body')

<div class="container hidden">
    <div class="col">
        <h2 class="text-center" style="margin-top:7rem; font-family: 'Quicksand', sans-serif;">Simulasi Cicilan Pinjaman</h2>

        <div class="container">
            <form class="mt-5">
        <div data-mdb-input-init class="form-outline">
            <select class="form-select form-select-lg mb-1" aria-label=".form-select-lg example">
                <option selected>Rp. 500.000</option>
                <option value="1">Rp. 1.000.000</option>
                <option value="2">Rp. 1.500.000</option>
                <option value="3">Rp. 2.000.000</option>
                <option value="4">Rp. 2.500.000</option>
                <option value="5">Rp. 3.000.000</option>
                <option value="6">Rp. 3.500.000</option>
                <option value="7">Rp. 4.000.000</option>
                <option value="8">Rp. 4.500.000</option>
                <option value="9">Rp. 5.000.000</option>
                <option value="10">Rp. 5.500.000</option>
                <option value="11">Rp. 6.000.000</option>
                <option value="12">Rp. 6.500.000</option>
                <option value="13">Rp. 7.000.000</option>
                <option value="14">Rp. 7.500.000</option>
                <option value="15">Rp. 8.000.000</option>
                <option value="16">Rp. 8.500.000</option>
                <option value="17">Rp. 9.000.000</option>
                <option value="18">Rp. 9.500.000</option>
                <option value="19">Rp. 10.000.000</option>
            </select>
          <label class="form-label mb-1" for="">Pilih Plafond</label>
        </div>
        <div data-mdb-input-init class="form-outline">
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                <option selected="1">1 Kali</option>
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
        <button data-mdb-ripple-init type="button" class="btn btn-success btn-block mb-4">Hitung Simulasi Cicilan</button>
        </div>        
        <div class="hasil" style="height : 30vh;">

        </div>
    </div>
      
    
@endsection