<x-guest.layout>
    <div class="overflow-hidden p-5">
        <div class="container-fluid col-xxl-8">
            <div class="row flex-lg-nowrap align-items-center g-5">
                <div class="order-lg-1 text-lg-start text-center">
                    <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/front-pages/landing-page/sitting-girl-with-laptop.png"
                        class="w-50">
                </div>
                <div class="col-lg-6 col-xl-5 text-center text-lg-start pt-lg-5 mt-xl-4">
                    <div class="lc-block mb-4">
                        <div editable="rich">
                            <h1 class="fw-bold display-3">Selamat Datang di Sistem Informasi Perpustakaan</h1>
                        </div>
                    </div>

                    <div class="lc-block mb-5">
                        <div editable="rich">
                            <p class="rfs-8"> Sistem ini dirancang untuk memudahkan akses ke koleksi buku dan sumber
                                daya lainnya. Dengan fitur pencarian canggih, Anda dapat dengan mudah menemukan buku
                                yang Anda cari.</p>
                        </div>
                    </div>

                    <div class="lc-block mb-6"><a class="btn btn-primary px-4 me-md-2 btn-lg"
                            href="{{ route('catalog.index') }}" role="button">Coba Sekarang</a>
                    </div>
                </div>

            </div><!-- /lc-block -->
        </div>
    </div>
</x-guest.layout>
