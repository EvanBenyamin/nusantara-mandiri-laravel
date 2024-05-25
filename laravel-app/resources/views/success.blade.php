@extends('layouts.main')
<style>
    /* Center content vertically */
    .vh-100 {
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
</style>
@section('body')


    <div class="container" style="margin-top:0rem;">
    
        <div class="row vh-100">
            @php
            use Carbon\Carbon;
            $currentDate = Carbon::now();
            @endphp
            <div class="col-md-6 mx-auto text-center">
                <img src="https://cdn.vectorstock.com/i/500p/02/19/ok-sign-winking-emoticon-vector-24420219.jpg" 
                style="width:200px;" alt="">
                <h1 class="mb-4 mt -5">Selamat Data pengajuan anda telah kami terima. </h1>
                <p class="lead">Silahkan lakukan pendaftaran di kantor Koperasi sebelum tanggal 
                    {{$currentDate->addDays(3)->format('d M Y') }}</p>
                <p>Jam Operasional: 09:00 s.d 17:00 WIB .</p>
                <p>Silakan hubungi layanan pelanggan untuk informasi lebih lanjut.</p>
                <a href="/" class="btn btn-success mt-3">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</div>
@endsection
