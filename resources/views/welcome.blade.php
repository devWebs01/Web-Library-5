<?php

use App\Models\Book;
use function Livewire\Volt\{state};

state([
    'books' => fn() => Book::inRandomOrder()->limit(10)->get(),
    'lopping' => 10,
]);

?>

<x-guest.layout>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

        <script>
            const swiperEl = document.querySelector('swiper-container')
            Object.assign(swiperEl, {
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: {
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30,
                    },
                    1024: {
                        slidesPerView: 4,
                        spaceBetween: 40,
                    },
                },
            });
            swiperEl.initialize();
        </script>
    @endpush

    <style>
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            width: 100%;
            background: #fff;
            /* Sesuaikan dengan desain */
            padding: 10px 0;
        }

        .marquee-content {
            display: flex;
            gap: 30px;
            /* Jarak antar item */
            animation: marquee-animation 32s linear infinite;
            width: max-content;

            /* Agar bisa berjalan terus */
        }

        .marquee-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        .marquee-content img {
            height: 50px;
            /* Sesuaikan ukuran logo */
        }

        /* Animasi infinite berjalan ke kiri */
        @keyframes marquee-animation {
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(-50%);
            }

        }
    </style>

    @volt
        <div>

            <div class="overflow-hidden my-5 mx-3">
                <section class="py-lg-16 py-6">
                    <div class="container-fluid">
                        <div class="row d-flex align-items-center">
                            <div class=" col-xxl-5  col-xl-6 col-lg-6 col-12">
                                <div>
                                    <h1 class="display-2 fw-bold mb-3">Temukan Buku Favoritmu di <u class="text-warning">
                                            <span class="text-primary">Perpustakaan!</span>
                                        </u>
                                    </h1>
                                    <p class="mb-4 display-6">Jelajahi banyak buku dari berbagai kategori dan pinjam mudah.
                                    </p>

                                </div>
                            </div>
                            <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6 col-12 d-lg-flex justify-content-end">
                                <div class="mt-12 mt-lg-0 position-relative">
                                    <div class="position-absolute top-0 start-0 translate-middle  d-none d-md-block">
                                        <img src="https://geeksui.codescandy.com/geeks/assets/images/svg/graphics-2.svg">
                                    </div>
                                    <img src="https://kopasjambi.com/wp-content/uploads/2024/06/Bingung-Mau-Masuk-SMKN-Mana-di-Kota-Jambi-Berikut-Rincian-Sekolah-dan-Jurusan-yang-Tersedia.jpg"
                                        alt="online course"
                                        class="img-fluid rounded-4 w-100 z-n1 position-relative rounded">
                                    <div class="position-absolute top-100 start-100 translate-middle  d-none d-md-block">
                                        <img src="https://geeksui.codescandy.com/geeks/assets/images/svg/graphics-1.svg"
                                            alt="graphics-1">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="container-fluid mt-5 py-5">
                    <div class="my-5 py-5">
                        <h3 class="fw-bold mb-0">Koleksi Buku</h3>
                        <p class="text-muted h4">Temukan berbagai buku menarik yang tersedia di perpustakaan sekolah kami.
                        </p>

                        <swiper-container class="mySwiper" init="false">
                            @foreach ($books as $book)
                                <swiper-slide>
                                    <a href="{{ route('catalog.show', $book->id) }}" class="card">
                                        {{-- {{ $book }} --}}
                                        <img class="card-img-top" style="object-fit: cover; width: 100%; height: 400px;"
                                            src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" />
                                    </a>

                                </swiper-slide>
                            @endforeach

                        </swiper-container>

                    </div>

                </section>

                <div class="py-8">
                    <div class="container">
                        <div class="row align-items-center">
                            <!-- col -->
                            <div class="col-lg-6 col-md-12 col-12">
                                <!-- content -->
                                <div class="pe-lg-6 ps-lg-6">
                                    <span class="text-primary ls-md text-uppercase fw-bold mb-0">Fitur Utama</span>
                                    <h2 class="display-4 mb-3 fw-bold">
                                        Sistem Perpustakaan Sekolah yang Modern & Efisien
                                    </h2>
                                    <h3>Kelola peminjaman buku dengan lebih mudah dan cepat.</h3>
                                    <div class="mt-6">
                                        <!-- icon with para -->
                                        <div class="d-flex mb-4">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" class="bi bi-book-half text-primary mt-1"
                                                    viewBox="0 0 16 16">
                                                    <path d="M8.5 2.5V15a.5.5 0 0 1-1 0V2.5a.5.5 0 0 1 1 0z" />
                                                    <path
                                                        d="M3.5 1h6a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-6a2.5 2.5 0 0 1 0-5h5.5a.5.5 0 0 0 0-1H3.5a3.5 3.5 0 0 0 0 7h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2h-6a.5.5 0 0 0 0 1z" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <!-- content -->
                                                <h3 class="mb-2">Katalog Buku</h3>
                                                <p class="mb-0 fs-4">
                                                    Temukan berbagai koleksi buku dengan fitur pencarian canggih dan
                                                    kategori yang jelas.
                                                </p>
                                            </div>
                                        </div>
                                        <!-- icon with para -->
                                        <div class="d-flex mb-4">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="currentColor" class="bi bi-arrow-repeat text-primary mt-1"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M11.534 3.07a.5.5 0 0 1 .2.683A5 5 0 1 0 8 13a.5.5 0 0 1 1 0 6 6 0 1 1 2.24-11.47.5.5 0 0 1-.706.54z" />
                                                    <path
                                                        d="M4.466 13.07a.5.5 0 0 1-.2-.683A5 5 0 1 0 8 3a.5.5 0 0 1-1 0 6 6 0 1 1-2.24 11.47.5.5 0 0 1 .706-.54z" />
                                                </svg>
                                            </div>
                                            <div class="ms-3">
                                                <h3 class="mb-2">Peminjaman & Pengembalian Mudah</h3>
                                                <p class="mb-0 fs-4">
                                                    Proses peminjaman dan pengembalian buku lebih praktis dengan sistem.
                                                </p>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12 border rounded bg-secondary d-lg-block d-none">
                                <!-- image -->
                                <div class="text-center ">
                                    <img src="/assets/img/cta-image.png" alt="Perpustakaan Sekolah"
                                        class="img-fluid w-75 h-75 rounded-4">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid py-8">
                    <div class="text-center mb-6 ">

                        <h4> Kunjungi kami dan dapatkan rekomendasi buku terbaik dari pustakawan!</h4>
                    </div>
                    <div class="marquee-container">
                        <div class="marquee-content align-items-center">
                            <!-- Logo dan teks bergerak -->
                            @foreach (range(1, $lopping) as $loop)
                                <div>
                                    <img src="assets/img/logo.png" alt="SMK 6 Kota Jambi" width="50" height="50">
                                </div>
                                <div class="mt-3">
                                    <h1 class="fw-bolder">SMK 6 Kota Jambi</h1>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                <section class="mb-0">

                    <div class="container-fluid">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7976.463983828744!2d103.670011!3d-1.6157420000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e258f6e15b23a35%3A0xbde262d54291b26d!2sSMK%20Negeri%206%20Kota%20Jambi!5e0!3m2!1sid!2sus!4v1738683044248!5m2!1sid!2sus"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            class="rounded w-100" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </section>

            </div>
        </div>
    @endvolt
</x-guest.layout>
