<x-guest.layout>
    <x-slot name="title">Catalog Book</x-slot>
    <div class="card m-5 mt-1 shadow-none">
        <div class="card-body text-center">
            <h5>Kode Peminjaman:</h5>
            <button type="button" disabled class="btn btn-body mb-4" style="outline-style: dashed;">
                <span class="fs-1 fs-md-4 text-dark" style="overflow-wrap: anywhere;">{{ $transaction->code }}</span>
            </button>
            <h5>Harap melakukan konfirmasi kepada petugas perpustakaan dalam waktu 24 jam <span
                    class="text-primary">({{ $countdown }})</span>, dengan
                menunjukkan kode yang telah diberikan.</h5>
            <a href="{{ route('catalog.history', auth()->user()->slug) }}" class="mb-3">
                Riwayat Peminjaman
                <i class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
            </a>
        </div>
        <div class="divider">
            <div class="divider-text fw-border fs-5">Kamu Mungkin Juga Suka</div>
        </div>
        <div class="card-body">
            <div class="row gy-4 mb-4">
                @foreach ($books as $book)
                    <div class="col-sm-6 col-lg-4">
                        <div class="card shadow-none border p-2 h-100">
                            <div class="rounded-2 text-center mb-3">
                                <a href="{{ route('catalog.show', $book->id) }}">
                                    <img class="img" style="object-fit: cover" src="{{ Storage::url($book->image) }}"
                                        width="100%" height="200px" alt="Book Cover">
                                </a>
                            </div>
                            <div class="card-body p-3 pt-2">
                                <div class="align-items-center mb-3 ">
                                    <span
                                        class="badge rounded-pill bg-label-primary text-wrap">{{ Str::limit($book->category->name, 30, '...') }}</span>
                                </div>
                                <a href="{{ route('catalog.show', $book->id) }}" class="h5">{{ $book->title }}</a>
                                <p class="mt-2">{{ Str::limit($book->synopsis, 50, '...') }}
                                </p>
                            </div>
                            <div class="card-footer">
                                <div
                                    class="d-flex flex-column flex-md-row gap-3 text-nowrap flex-wrap flex-md-nowrap  flex-lg-wrap flex-xxl-nowrap">
                                    <a class="w-100 btn btn-outline-primary d-flex align-items-center waves-effect"
                                        href="{{ route('catalog.show', $book->id) }}">
                                        <span class="me-1">Continue</span><i
                                            class="mdi mdi-arrow-right lh-1 scaleX-n1-rtl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-guest.layout>
