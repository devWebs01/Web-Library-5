<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="/assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title ?? 'Sistem Informasi Perpustakaan' }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/logo.png') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="/assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    @livewireStyles

    <!-- Helpers -->
    <script src="/assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="/assets/js/config.js"></script>
    <link rel="stylesheet" href="/assets/vendor/fonts/materialdesignicons.css" />
    @stack('css')

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Belanosima:wght@400;600;700&family=Gabarito:wght@500;600;700;800&display=swap');

        * {
            font-family: 'Belanosima', sans-serif;
            font-family: 'Gabarito', cursive;
        }

        .card-cover {
            position: relative;
            overflow: hidden;
        }

        .card-cover .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna hitam dengan transparansi */
            z-index: 1;
        }

        .card-cover .text-shadow-1 {
            z-index: 2;
            position: relative;
        }
    </style>

    
</head>

<body class="bg-white">
    @include('layouts.payment_date')

    <x-guest.navbar></x-guest.navbar>

    <div class="container-fluid">
        @if (session('success'))
            <div class="alert alert-primary alert-dismissible mb-3" role="alert">
                <i class="mdi mdi-check-circle-outline mdi-24px me-2"></i>
                <span>
                    {{ session('success') }}
                </span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif ($errors->any())
            <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                <i class="mdi mdi-close-circle mdi-24px me-2"></i>
                @foreach ($errors->all() as $error)
                    <span>{{ $error }}</span>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning alert-dismissible mb-3" role="alert">
                <i class="mdi mdi-close-circle mdi-24px me-2"></i>
                <span>{{ session('warning') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
    </div>
    {{ $slot }}

    <!-- footer -->
    <footer class="pt-5 mt-0 pb-3 bg-dark text-white">
        <div class="container">
            <div class="row justify-content-center text-center align-items-center">
                <div class="col-12 col-md-12 col-xxl-6 px-0">
                    <div class="mb-4">
                        <a href="/">
                            <img src="http://127.0.0.1:8000/assets/img/logo.png" alt="logo"
                                class="mb-4 logo-inverse" width="60" height="60">
                        </a>
                        <p class="lead">Sistem Perpustakaan Sekolah yang memudahkan siswa dan guru dalam mencari,
                            meminjam, dan mengelola koleksi buku secara digital.</p>
                    </div>
                    <nav class="nav nav-footer justify-content-center">
                        <a class="nav-link text-white" href="/">Beranda</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link text-white" href="{{ route('catalog.index') }}">Koleksi Buku</a>
                        <span class="my-2 vr opacity-50"></span>

                        @auth
                            @if (auth()->user()->role == 'Anggota')
                                <a class="nav-link text-white" href="{{ route('catalog.history') }}">Riwayat</a>
                                <span class="my-2 vr opacity-50"></span>
                                <a class="nav-link text-white text-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class="nav-link text-white" href="/home">Beranda Admin</a>
                            @endif
                        @else
                            <a class="nav-link text-white" href="/login">Masuk</a>
                            <span class="my-2 vr opacity-50"></span>
                            <a class="nav-link text-white" href="/register">Daftar</a>
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
    <!-- Footer -->

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
    <script src="/assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="/assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @livewireScripts
    @stack('scripts')
    <script>
        @stack('js')
    </script>
</body>

</html>
