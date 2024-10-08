<!doctype html>
<html lang="en">
    <head>
        <title>Nusantara Mandiri | {{ $title }}</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=yes"
        />
        <link rel="icon" href=
        "/assets/images/bg-koperasi.png"
        type="image/x-icon" class="rounded-circle">

        <!-- Bootstrap CSS v5.3.3 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <!-- Google Font  -->
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
       <!-- My CSS -->
       <link rel="stylesheet" href="assets/styles.css" />
        <!-- Font Awesome 5.15.4 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Leaflet.JS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    
      </head>

    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-lg navbar-dark custom-bg-color">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">
                        <img src="/assets/images/bg-koperasi.png" alt="" width="50" height="36"class="d-inline-block align-text-top rounded-circle" 
                         border> Nusantara Mandiri
                    </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2">
                      <li class="nav-item"> 
                        <a class="nav-link active" aria-current="page" id="home" href="#jumbotron">Beranda</a>
                      </li>
                      <li class="nav-item">
                        <a id="layanan" class="nav-link" href="#services">Layanan Kami</a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Lainnya
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/simulasi">Simulasi Cicilan</a></li>
                            <li><a class="dropdown-item" href="/pengajuan">Ajukan Pinjaman</a></li>
                            <li><a class="dropdown-item" href="#">Cabang Koperasi</a></li>
                            <li><a class="dropdown-item" href="#">Hubungi Kami</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
        </header>
        <main class="bg-light" bg-light>
          <section id="jumbotron" aria-label="Jumbotron">
        <div class="row">
              <div class="col-lg-6 col-md-12 cointainer-fluid">
                  <div class="jumbotron">
                      <img src="/assets/images/3.png" class="img-fluid   hidden" alt="">
                  </div>
              </div>
              <div class="col-lg-6 d-none d-md-block">
                <div class="jumbotron">
                    <div class="vector-container hidden">
                        <img src="/assets/images/vector.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row curious">
          <div style="background-color: #007447;">
            <button id="button" class="btn btn-lg btn-outline-success">Pelajari Lebih Lanjut
              <i class="fas fa-arrow-right"></i>
          </button>
          
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007447" fill-opacity="1" d="M0,320L34.3,288C68.6,256,137,192,206,176C274.3,160,343,192,411,208C480,224,549,224,617,202.7C685.7,181,754,139,823,138.7C891.4,139,960,181,1029,181.3C1097.1,181,1166,139,1234,144C1302.9,149,1371,203,1406,229.3L1440,256L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z"></path></svg>
        </section>

        <aside>
          <div class="social-media">
            <ul>
              <li>
                <a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
              </li>
              <li>
                <a href="#"><i class="fab fa-facebook"></i></a>
              </li>
            </ul>
          </div>
        </aside>


       
        <section aria-label = "Why us?" >
         <div class="bg-light">
          <div class="section hidden">
            <h1 id="icons" class="row display-4 justify-content-center" style= " font-family: 'Quicksand', sans-serif; font-weight: 350;" >
              Mengapa Pilih Kami?</h1>
          </div>
          <div class="text-center hidden">
            <div class="row">
              <div class="col-lg-4 col-md-12">
                <div class="icon-wrapper">
                  <i class="fas fa-users fa-6x"id="green"></i>
                   <div class="counter" data-count="2000">0</div>
                  <p>Telah melayani dan dipercaya oleh lebih dari 2000 nasabah selama 10 tahun</p>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="icon-wrapper hidden">
                  <i class="fa-solid fa-money-bill-transfer fa-6x" id="green"></i>
                  <div class="counter" data-count="5000">0</div>
                  <p>Telah melakukan lebih dari 5.000 transaksi dalam 5 tahun terakhir</p>
                </div> 
              </div>
              <div class="col-lg-4 col-md-12 ">
                <div class="icon-wrapper hidden">
                  <i class="fa-solid fa-location-dot fa-6x" id="green"></i>
                  <div class="counter" data-count="3">0</div>
                  <p>Memiliki 3 cabang aktif di daerah Kabupaten Bandung</p>
                </div>
              </div>
            </div>
          </div>
        </div> 
          </section>

          <section aria-label="Layanan Nusantara Mandiri">
            <div class="section-gray">
              <h2 id="services" class="display-4">Layanan Kami</h2>
              <div class="container-fluid text-center hidden">
                <div class="row">
                          <div class="col-lg-4 mb-4">
                              <div class="card">
                                  <img src="/assets/images/Calculate.png" class="card-img-top">
                                  <div class="card-body">
                                      <h5 class="card-title">Simulasi Cicilan</h5>
                                      <p class="card-text">
                                        Silahkan tentukan jumlah pinjaman yang Anda 
                                        inginkan serta tingkat bunga yang telah ditetapkan
                                        di sini! klik tombol dibawah untuk
                                        mendapatkan informasi lebih lanjut.
                                      </p>
                                      <a href="/simulasi" class="btn btn-outline-success btn-sm">Lakukan Simulasi</a>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                              <div class="card">
                                  <img src="/assets/images/loan-proposal.png" class="card-img-top">
                                  <div class="card-body">
                                      <h5 class="card-title">Pengajuan Secara Online</h5>
                                      <p class="card-text">
                                        Lakukan pengajuan pinjaman anda secara online dengan cara
                                        mengisi formulir data diri anda, dan jumlah pinjaman 
                                        setelah itu anda akan dievaluasi untuk melakukan pinjaman
                                      </p>
                                      <a href="/pengajuan" class="btn btn-outline-success btn-sm">Ajukan Pinjaman Sekarang</a>
                                     </div>
                              </div>
                          </div>
                          <div class="col-lg-4 mb-4">
                              <div class="card">
                                  <img src="/assets/images/FGD.png" alt="" class="card-img-top">
                                  <div class="card-body">
                                      <h5 class="card-title">Fitur Dashboard untuk Nasabah</h5>
                                      <p class="card-text">
                                        Daftar menjadi nasabah kami dan anda dapat menggunakan fitur dashboard
                                        dan lakukan <i>Re-Order</i> dengan mudah, tanpa harus melakukan proses
                                        administrasi secara ulang sekarang.  
                                      </p>
                                      <a href="" class="btn btn-outline-success btn-sm">Masuk ke Forum</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
        </section>
        <section>
            <div class="container">
              <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
              <div class="elfsight-app-fc7e5f3f-8b63-49a8-a098-31f1d9e51bc0" data-elfsight-app-lazy></div>
            </div>
        </section>


        <section aria-label="Our Location">
          <div class="bg-light">
            <div class="section">
              <h1 class="row display-4 justify-content-center" style= " font-family: 'Quicksand', sans-serif; font-weight: 350;" >
                Cabang Koperasi</h1>
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1L3zfDg8qZ479n6pMAiF5B0NbzlgTw6s&output=embed"
                width="1600" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade"></iframe>           
            </div>
            <!-- Leaflet.js  -->
        </section>
        
        


      
        </main>
     </body>   
<footer class="bg-body-tertiary text-center text-lg-start"> 
  <!-- Copyright -->
  <div class="text-center p-3 text-light" style="background-color: #161616">
    © 2024 Copyright:
    <a class="text-light" href="#jumbotron">Koperasi Nusantara Mandiri</a>
  </div>
  <!-- Copyright -->
</footer>
        <!-- Bootstrap JavaScript Libraries -->
    <!-- jquery -->
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script async src="https://ga.jspm.io/npm:es-module-shims@1.5.5/dist/es-module-shims.js"></script>
  <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/esm/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.esm.min.js"
      }
    }
  </script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


  <!-- bootstrap.min.js -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="/assets/scripts.js"></script>
  </body>
</html>
