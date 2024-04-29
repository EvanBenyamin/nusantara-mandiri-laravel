<!doctype html>
<html lang="en">
    <head>
        <title>Nusantara Mandiri || Nasabah </title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        


        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <div class="container">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kebutuhan Pinjaman</th>
                    <th scope="col">Pekerjaan</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Lama Angsuran</th>
                    <th scope="col">Kelengkapan Berkas</th>
                    <th scope="col">Jumlah Pinjaman</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($customer as $c)
                <tr>
                    <td>{{ $c ["id"] }}</td>
                    <td href="google.co.id" >{{ $c ["nama"] }} </td>
                    <td>{{ $c ["alasan"] }}</td>
                    <td>{{ $c ["status_kepegawaian"] }}</td>
                    <td>Rp. {{ $c ["pendapatan"] }}</td>
                    <td class="" >{{ $c ["lama_angsuran"] }} Bulan</td>
                    <td class="text-center">{{ $c ["kelengkapan_berkas"] }}</td>
                    <td class="text-center">Rp. {{ $c ["pinjaman"] }}</td>
                </tr>
                @endforeach
                
               
                </tbody>
            </div>
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
