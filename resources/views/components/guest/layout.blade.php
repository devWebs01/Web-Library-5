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

    @vite([])
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

    <!-- Footer -->
    <!-- footer -->
    <footer class="pt-5 pb-3">
        <div class="container">
            <div class="row  justify-content-center text-center  align-items-center ">

                <div class="col-12 col-md-12 col-xxl-6 px-0 ">
                    <div class="mb-4">
                        <a href="../index.html">
                            <img src="../assets/images/brand/logo/logo.svg" alt="" class="mb-4 logo-inverse">
                        </a>
                        <p class="lead">Geek is feature rich components and beautifully Bootstrap 5 template for
                            developers,
                            built with bootstrap responsive framework.</p>
                    </div>
                    <nav class="nav nav-footer justify-content-center">
                        <a class="nav-link" href="#">About</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="#">Careers </a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="#">Contact</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="#">Pricing</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="#">Blog</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="#">Affilliate</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="#">Help</a>
                        <span class="my-2 vr opacity-50"></span>
                        <a class="nav-link" href="#">Investors</a>
                    </nav>
                </div>
            </div>
            <!-- Desc -->
            <hr class="mt-6 mb-3">
            <div class="row align-items-center">
                <!-- Desc -->
                <div class="col-lg-3 col-md-6 col-12">
                    <span>© <span id="copyright4">
                            <script>
                                document.getElementById('copyright4').appendChild(document.createTextNode(new Date()
                                    .getFullYear()))
                            </script>
                        </span> Geeks-UI, Inc. All Rights Reserved</span>
                </div>

                <!-- Links -->
                <div class="col-12 col-md-6 col-lg-7 d-lg-flex justify-content-center">
                    <nav class="nav nav-footer">
                        <a class="nav-link ps-0" href="#">Privacy Policy</a>
                        <a class="nav-link px-2 px-md-0" href="#">Cookie Notice </a>

                        <a class="nav-link" href="#">Terms of Use</a>
                    </nav>
                </div>
                <div class="col-lg-2 col-md-12 col-12 d-lg-flex justify-content-end">
                    <div class="">
                        <!--Facebook-->
                        <a href="#" class=" me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                <path
                                    d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                            </svg>
                        </a>
                        <!--Twitter-->
                        <a href="#" class=" me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                <path
                                    d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                            </svg>
                        </a>

                        <!--GitHub-->
                        <a href="#" class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                <path
                                    d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>

            <!-- Links -->


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
