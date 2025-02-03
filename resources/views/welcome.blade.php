<?php

use App\Models\Book;
use function Livewire\Volt\{state};

state([
    'books' => fn() => Book::inRandomOrder()->limit(10)->get(),
    'book1',
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
                                    <p class="h4 mb-4">Jelajahi banyak buku dari berbagai kategori dan pinjam mudah.</p>

                                </div>
                            </div>
                            <div class="col-xxl-5 offset-xxl-1 col-xl-6 col-lg-6 col-12 d-lg-flex justify-content-end">
                                <div class="mt-12 mt-lg-0 position-relative">
                                    <div class="position-absolute top-0 start-0 translate-middle  d-none d-md-block">
                                        <img src="https://geeksui.codescandy.com/geeks/assets/images/svg/graphics-2.svg">
                                    </div>
                                    <img src="https://i0.wp.com/smkn6jambi.wordpress.com/wp-content/uploads/2018/04/img_20180319_091842_hdr.jpeg?w=1200&h=&ssl=1"
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

                <section class="container-fluid my-5 py-5">
                    <div class="my-5 py-5">
                        <h3 class="fw-bold">Koleksi Buku</h3>
                        <p class="text-muted">Temukan berbagai buku menarik yang tersedia di perpustakaan sekolah kami.</p>

                        <swiper-container class="mySwiper" init="false">
                            @foreach ($books as $book)
                                <swiper-slide>
                                    <div class="card">
                                        {{-- {{ $book }} --}}
                                        <img class="card-img-top" style="object-fit: cover; width: 100%; height: 400px;"
                                            src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" />
                                    </div>

                                </swiper-slide>
                            @endforeach

                        </swiper-container>

                    </div>

                </section>

                <section class="py-lg-8 py-6">
                    <div class="container py-lg-8">
                        <div class="row align-items-center">
                            <div class="offset-xl-1 col-xl-4 col-lg-6 d-none d-lg-block">
                                <div class="position-relative">
                                    <img src="https://geeksui.codescandy.com/geeks/assets/images/mentor/become-mentor.jpg"
                                        alt="Perpustakaan Sekolah" class="img-fluid w-100 rounded-4">

                                    <img src="https://geeksui.codescandy.com/geeks/assets/images/mentor/schedule.svg"
                                        alt="schedule"
                                        class="position-absolute top-50 start-100 translate-middle mt-n8 d-xl-block d-none">
                                    <img src="https://geeksui.codescandy.com/geeks/assets/images/mentor/verify.svg"
                                        alt="verify"
                                        class="position-absolute top-50 start-0 translate-middle mt-n2 d-xl-block d-none">

                                    <img src="https://geeksui.codescandy.com/geeks/assets/images/mentor/card.svg"
                                        alt="card"
                                        class="position-absolute top-50 start-0 translate-middle mt-8 d-xl-block d-none">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-5 offset-lg-1 offset-xl-1">
                                <div class="d-flex flex-column gap-6">
                                    <div class="d-flex flex-column gap-2 fw-bolder">
                                        <h2 class="mb-0 h1">Perpustakaan Sekolah Kami</h2>
                                        <p class="mb-0 fs-5">
                                            Perpustakaan sekolah kami menyediakan berbagai buku pelajaran, fiksi, dan
                                            referensi untuk menunjang
                                            kegiatan belajar siswa. Dengan sistem peminjaman yang mudah dan koleksi yang
                                            terus diperbarui, kami
                                            berkomitmen untuk meningkatkan minat baca siswa.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="bg-primary">
                    <div class="container">
                        <div class="row align-items-center g-0">
                            <div class="col-xl-6 col-lg-6 col-md-12">
                                <div>
                                    <h1 class="text-white display-4 fw-bold pe-lg-8">Akses Buku dengan Mudah
                                    </h1>
                                    <!-- text -->
                                    <p class="text-white-50 mb-4 lead">
                                        Nikmati kemudahan dalam mencari dan meminjam buku di perpustakaan sekolah. Cek
                                        ketersediaan buku secara online
                                        dan pinjam langsung dari katalog digital kami.
                                    </p>
                                    <!-- btn -->
                                    <a href="#" class="btn btn-dark">View opportunities</a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 text-lg-end text-center pt-6">
                                <img src="https://geeksui.codescandy.com/geeks/assets/images/hero/hero-img.png"
                                    alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endvolt
</x-guest.layout>
