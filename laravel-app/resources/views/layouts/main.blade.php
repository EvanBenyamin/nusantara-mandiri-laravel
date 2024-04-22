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
                    <a class="navbar-brand" href="/home">
                        <img src="/assets/images/bg-koperasi.png" alt="" width="50" height="36"class="d-inline-block align-text-top rounded-circle" 
                         border> Nusantara Mandiri
                    </a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2">
                      <li class="nav-item"> 
                        <a class="nav-link" aria-current="page" id="home" href="home">Beranda</a>
                      </li>
                      <li class="nav-item">
                        <a id="layanan" class="nav-link" href="/home#services">Layanan Kami</a>
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
        <main>
          <body>
            @yield('body')
          </body>
        </main>

        <footer class="bg-body-tertiary text-center text-lg-start"> 
            <!-- Copyright -->
            <div class="text-center p-3 text-light" style="background-color: #161616">
              © 2024 Copyright:
              <a class="text-light" href="/home">Koperasi Nusantara Mandiri</a>
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