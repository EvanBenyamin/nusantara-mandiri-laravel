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
            <div class="col-md-6 mx-auto text-center">
                <img src="https://cdn.vectorstock.com/i/500p/02/19/ok-sign-winking-emoticon-vector-24420219.jpg" 
                style="width:200px;" alt="">
                <h1 class="mb-4 mt -5">Selamat Anda Layak Melakukan Pinjaman!</h1>
                <p class="lead">Data pengajuan anda telah kami terima.</p>
                <p>Silakan hubungi layanan pelanggan untuk informasi lebih lanjut.</p>
                <a href="/" class="btn btn-success mt-3">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</div>
@endsection
