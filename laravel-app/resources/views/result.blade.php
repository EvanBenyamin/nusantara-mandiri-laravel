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
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Emoji_u1f64f.svg/1200px-Emoji_u1f64f.svg.png" 
                style="width:200px;" alt="">
                <h1 class="mb-4 mt -5">Mohon Maaf</h1>
                <p class="lead">Anda tidak memenuhi standar kelayakan pinjaman.</p>
                <p>Silakan hubungi layanan pelanggan untuk informasi lebih lanjut.</p>
                <a href="/" class="btn btn-success mt-3">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</div>
@endsection
