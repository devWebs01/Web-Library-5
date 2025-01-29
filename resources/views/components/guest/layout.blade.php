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
    <link rel="icon" type="image/x-icon" href="/assets/img/favicon/favicon.ico" />

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

<body>
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

    <div class="container-fluid m-0 p-0" style=" position: absolute;
    left: 0px;
    top: -10px;
    z-index: -1;">
        <svg id="wave" style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 190" version="1.1"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop stop-color="rgba(144, 85, 253, 1)" offset="0%"></stop>
                    <stop stop-color="rgba(0, 0, 0, 0)" offset="100%"></stop>
                </linearGradient>
            </defs>
            <path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)"
                d="M0,95L10,104.5C20,114,40,133,60,136.2C80,139,100,127,120,114C140,101,160,89,180,82.3C200,76,220,76,240,82.3C260,89,280,101,300,104.5C320,108,340,101,360,88.7C380,76,400,57,420,50.7C440,44,460,51,480,60.2C500,70,520,82,540,88.7C560,95,580,95,600,107.7C620,120,640,146,660,133C680,120,700,70,720,47.5C740,25,760,32,780,57C800,82,820,127,840,148.8C860,171,880,171,900,167.8C920,165,940,158,960,145.7C980,133,1000,114,1020,101.3C1040,89,1060,82,1080,85.5C1100,89,1120,101,1140,88.7C1160,76,1180,38,1200,44.3C1220,51,1240,101,1260,123.5C1280,146,1300,139,1320,142.5C1340,146,1360,158,1380,139.3C1400,120,1420,70,1430,44.3L1440,19L1440,190L1430,190C1420,190,1400,190,1380,190C1360,190,1340,190,1320,190C1300,190,1280,190,1260,190C1240,190,1220,190,1200,190C1180,190,1160,190,1140,190C1120,190,1100,190,1080,190C1060,190,1040,190,1020,190C1000,190,980,190,960,190C940,190,920,190,900,190C880,190,860,190,840,190C820,190,800,190,780,190C760,190,740,190,720,190C700,190,680,190,660,190C640,190,620,190,600,190C580,190,560,190,540,190C520,190,500,190,480,190C460,190,440,190,420,190C400,190,380,190,360,190C340,190,320,190,300,190C280,190,260,190,240,190C220,190,200,190,180,190C160,190,140,190,120,190C100,190,80,190,60,190C40,190,20,190,10,190L0,190Z">
            </path>
        </svg>
    </div>

    <!-- Footer -->
    <footer class="container p-4 text-center ">
        <!-- Grid container -->
        <div class="">
            <!-- Copyright -->
            <div class="text-center p-3">
                © {{ date('Y') }} - <a class="text-dark" href="#">SMK 6 Kota Jambi</a>
            </div>
            <!-- Copyright -->
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
