<!DOCTYPE html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'Sistem Informasi Perpustakaan' }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="/assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
    <link rel="stylesheet" href="/assets/vendor/fonts/materialdesignicons.css" />

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=Gabarito:wght@500;600;700;800&display=swap');

        * {
            font-family: 'Belanosima', sans-serif;
            font-family: 'Gabarito', cursive;
        }
    </style>

</head>

<body>
    <header style="position: relative; left: 0; top: 0; z-index: -1;">
        <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 230" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(144, 85, 253, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(255, 255, 255, 0)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)"
                d="M0,138L14.1,130.3C28.2,123,56,107,85,107.3C112.9,107,141,123,169,115C197.6,107,226,77,254,57.5C282.4,38,311,31,339,57.5C367.1,84,395,146,424,153.3C451.8,161,480,115,508,103.5C536.5,92,565,115,593,122.7C621.2,130,649,123,678,107.3C705.9,92,734,69,762,49.8C790.6,31,819,15,847,38.3C875.3,61,904,123,932,141.8C960,161,988,138,1016,122.7C1044.7,107,1073,100,1101,84.3C1129.4,69,1158,46,1186,49.8C1214.1,54,1242,84,1271,84.3C1298.8,84,1327,54,1355,61.3C1383.5,69,1412,115,1440,134.2C1468.2,153,1496,146,1525,153.3C1552.9,161,1581,184,1609,161C1637.6,138,1666,69,1694,65.2C1722.4,61,1751,123,1779,138C1807.1,153,1835,123,1864,115C1891.8,107,1920,123,1948,130.3C1976.5,138,2005,138,2019,138L2032.9,138L2032.9,230L2018.8,230C2004.7,230,1976,230,1948,230C1920,230,1892,230,1864,230C1835.3,230,1807,230,1779,230C1750.6,230,1722,230,1694,230C1665.9,230,1638,230,1609,230C1581.2,230,1553,230,1525,230C1496.5,230,1468,230,1440,230C1411.8,230,1384,230,1355,230C1327.1,230,1299,230,1271,230C1242.4,230,1214,230,1186,230C1157.6,230,1129,230,1101,230C1072.9,230,1045,230,1016,230C988.2,230,960,230,932,230C903.5,230,875,230,847,230C818.8,230,791,230,762,230C734.1,230,706,230,678,230C649.4,230,621,230,593,230C564.7,230,536,230,508,230C480,230,452,230,424,230C395.3,230,367,230,339,230C310.6,230,282,230,254,230C225.9,230,198,230,169,230C141.2,230,113,230,85,230C56.5,230,28,230,14,230L0,230Z">
            </path>
        </svg>
    </header>
    <!-- Content -->
    {{ $slot }}
    <!-- / Content -->

    <!-- footer -->
    <footer class="pt-5 pb-3">
        <div class="container">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-12 col-md-12 col-xxl-6 px-0">
                    <div class="mb-4">
                        <a href="/">
                            <img src="http://127.0.0.1:8000/assets/img/logo.png" alt="logo"
                                class="mb-4 logo-inverse" width="30" height="30">
                        </a>
                        <p class="lead">Sistem Perpustakaan Sekolah yang memudahkan siswa dan guru dalam mencari,
                            meminjam, dan mengelola koleksi buku secara digital.</p>
                    </div>
                    <nav class="nav nav-footer justify-content-center">
                        <a class="nav-link" href="/">Beranda</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="{{ route('catalog.index') }}">Koleksi Buku</a>
                        <span class="my-2 vr opacity-50"></span>

                        @auth
                            @if (auth()->user()->role == 'Anggota')
                                <a class="nav-link" href="{{ route('catalog.history') }}">Riwayat</a>
                                <span class="my-2 vr opacity-50"></span>
                                <a class="nav-link text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class="nav-link" href="/home">Beranda Admin</a>
                            @endif
                        @else
                            <a class="nav-link" href="/login">Masuk</a>
                            <span class="my-2 vr opacity-50"></span>
                            <a class="nav-link" href="/register">Daftar</a>
                        @endauth
                    </nav>

                </div>
            </div>
            <hr class="mt-6 mb-3">
            <div class="row align-items-center">
                <div class="text-center col-12">
                    <span>© <span id="copyright4">
                            <script>
                                document.getElementById('copyright4').appendChild(document.createTextNode(new Date().getFullYear()))
                            </script>
                        </span> Perpustakaan Sekolah. Hak Cipta Dilindungi.</span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/assets/vendor/libs/popper/popper.js"></script>
    <script src="/assets/vendor/js/bootstrap.js"></script>
    <script src="/assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
