<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bappelitbangda - Kota Pasuruan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.min.css">
        <link href="{{ asset('bs/custom.css')}}" rel="stylesheet" >
        @stack('scripts')
    </head>
    <body>
        <header class="d-flex flex-wrap justify-content-center py-2 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto px-5 link-body-emphasis text-decoration-none">
                <img src="{{ asset('logo/Lambang-Kota-Pasuruan-Asli.png')}}" alt="logo-paskot" width="55" height="65">
                <span class="fs-4 px-2">E-APIK</span>
            </a>
            <div class="menu-link">
                <ul class="nav nav-pills align-items-center py-2 px-5 fs-5 fw-light">
                    <li class="nav-item"><a href="#" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Tentang</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Layanan</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Kontak Kami</a></li>
                </ul>
            </div>
        </header>
        <nav class="navbar navbar-expand-sm border-bottom nav-color px-5">
            <div class="collapse navbar-collapse justify-content-md-end" id="navbarsExample08">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link text-white px-3">RPJMD</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" data-bs-toggle="dropdown" aria-expanded="false">Pohon Kinerja</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('pokin.struktur') }}">Struktur</a></li>
                            <li><a class="dropdown-item" href="{{ route('pokin.dokumen') }}">Dokumen</a></li>
                            <li></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a href="{{ route('cascading.dokumen')}}" class="nav-link text-white px-3">Cascading</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-white px-3">Manual Indikator</a></li>
                </ul>
            </div>
        </nav>
        <main class="px-5 mt-3">
            @yield('content')
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.min.js"></script>
        @stack('js')
    </body>
</html>
