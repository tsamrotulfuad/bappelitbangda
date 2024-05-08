<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin - Dashboard</title>
    <!-- Vendors styles-->
    <link rel="stylesheet" href="{{ asset('coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('coreui/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->
    <link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet">
    <!-- We use those styles to show code examples, you should remove them in your application.-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <script src="{{ asset('coreui/js/config.js') }}"></script>
    <script src="{{ asset('coreui/js/color-modes.js') }}"></script>
</head>
<body>
    <div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
        <div class="sidebar-header border-bottom">
            <div class="sidebar-header">
                <div class="sidebar-brand"><b>App Name</b></div>
              </div>            
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard.index') }}">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}">
                        </use>
                    </svg> Dashboard</a></li>
            <li class="nav-title">RENDALEV</li>
            <li class="nav-group @yield('dropmenu')"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-calendar') }}"></use>
                    </svg> RPJMD</a>
                <ul class="nav-group-items compact">
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/visi*') ? 'active' : '' }}" href="{{ route('visi.index')}}"><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Visi</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/misi*') ? 'active' : '' }}" href="{{ route('misi.index')}}"><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Misi</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/tujuan*') ? 'active' : '' }}" href="{{ route('tujuan.index')}}"><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Tujuan</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/sasaran*') ? 'active' : '' }}" href="{{ route('sasaran.index')}}"><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Sasaran</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->is('admin/program*') ? 'active' : '' }}" href="{{ route('program.index')}}"><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Program</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}">
                        </use>
                    </svg> RKPD</a>
                <ul class="nav-group-items compact">
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Tema</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Prioritas Pembangunan</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Pokok Pikiran</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Renja</a></li>
                </ul>
            </li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-inbox') }}"></use>
                    </svg> Renstra</a>
                <ul class="nav-group-items compact">
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Tujuan</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Sasaran</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Indikator</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Target</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Program</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><span class="nav-icon"><span
                                    class="nav-icon-bullet"></span></span> Kegiatan</a></li>
                </ul>
            </li>
            <li class="nav-title">Data AKIP</li>
            <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-spreadsheet') }}">
                        </use>
                    </svg> Pohon Kinerja</a>
                <ul class="nav-group-items compact">
                    <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span
                                class="nav-icon"><span class="nav-icon-bullet"></span></span> Kota</a></li>
                    <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span
                                class="nav-icon"><span class="nav-icon-bullet"></span></span> Perangkat Daerah</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                    </svg> Cascading</a></li>
            <li class="nav-item"><a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                    </svg> Manual indikator</a></li>
            <li class="nav-item"><a class="nav-link" href="">
                    <svg class="nav-icon">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                    </svg> Perjanjian Kinerja</a></li>
           
            <li class="nav-title">Master Data</li>
            <li class="nav-item"><a class="nav-link {{ request()->is('admin/opds*') ? 'active' : '' }}"
                href="{{ route('opds.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-building') }}"></use>
                </svg> OPD</a></li>
        </ul>
        <div class="sidebar-footer border-top d-none d-md-flex">
            <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
        </div>
    </div>
    <div class="wrapper d-flex flex-column min-vh-100">
        <header class="header header-sticky p-0 mb-4">
            <div class="container-fluid border-bottom px-4">
                <button class="header-toggler" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"
                    style="margin-inline-start: -14px;">
                    <svg class="icon icon-lg">
                        <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
                    </svg>
                </button>
                <ul class="header-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-bell') }}">
                                </use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use
                                    xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-list-rich') }}">
                                </use>
                            </svg></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">
                            <svg class="icon icon-lg">
                                <use
                                    xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-envelope-open') }}">
                                </use>
                            </svg></a></li>
                </ul>
                <ul class="header-nav">
                    <li class="nav-item py-1">
                        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
                    </li>
                    <li class="nav-item dropdown">
                        <button class="btn btn-link nav-link py-2 px-2 d-flex align-items-center" type="button"
                            aria-expanded="false" data-coreui-toggle="dropdown">
                            <svg class="icon icon-lg theme-icon-active">
                                <use
                                    xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}">
                                </use>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" style="--cui-dropdown-min-width: 8rem;">
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button"
                                    data-coreui-theme-value="light">
                                    <svg class="icon icon-lg me-3">
                                        <use
                                            xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-sun') }}">
                                        </use>
                                    </svg>Light
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button"
                                    data-coreui-theme-value="dark">
                                    <svg class="icon icon-lg me-3">
                                        <use
                                            xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-moon') }}">
                                        </use>
                                    </svg>Dark
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center active" type="button"
                                    data-coreui-theme-value="auto">
                                    <svg class="icon icon-lg me-3">
                                        <use
                                            xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-contrast') }}">
                                        </use>
                                    </svg>Auto
                                </button>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item py-1">
                        <div class="vr h-100 mx-2 text-body text-opacity-75"></div>
                    </li>
                    <li class="nav-item dropdown"><a class="nav-link py-0 pe-0" data-coreui-toggle="dropdown"
                            href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-md"><img class="avatar-img"
                                    src="{{ asset('coreui/assets/img/avatars/9.jpg') }}" alt="user@email.com"></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pt-0">
                            <div class="dropdown-header bg-body-tertiary text-body-secondary fw-semibold my-2">
                                <div class="fw-semibold">Settings</div>
                            </div><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use
                                        xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                                    </use>
                                </svg> Profile</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use
                                        xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-settings') }}">
                                    </use>
                                </svg> Settings</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use
                                        xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-lock-locked') }}">
                                    </use>
                                </svg> Lock Account</a><a class="dropdown-item" href="#">
                                <svg class="icon me-2">
                                    <use
                                        xlink:href="{{ asset('coreui/vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                                    </use>
                                </svg> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="container-fluid px-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb my-0">
                        <li class="breadcrumb-item active"><span>@yield('breadcrumb')</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="body flex-grow-1">
            <div class="container-fluid px-4">
                @yield('content')
            </div>
        </div>
        <footer class="footer px-4">
            <div>© Bappelitbangda Kota Pasuruan</div>
            <div class="ms-auto">{{ \Carbon\Carbon::now()->isoFormat('Y') }} versi 1.0</div>
        </footer>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        const header = document.querySelector('header.header');

        document.addEventListener('scroll', () => {
            if (header) {
                header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
            }
        });
    </script>
    <script>
        //message with toastr
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL');
        @endif
    </script>
    @stack('scripts')
</body>
</html>
