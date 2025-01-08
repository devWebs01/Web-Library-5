<x-auth.layout>
    <x-slot name="title">Penalty Payment</x-slot>

    <div class="row">
        <div class="col-12 col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title text-center">
                        <h5 class="fw-bold">Pembayaran Denda Peminjaman dan Pengembalian Buku Perpustakaan</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Kembali</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $transaction->borrow_date }}</td>
                                    <td>{{ $transaction->return_date }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end align-items-center m-3 p-1">
                        <div class="order-calculations">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="w-px-100 text-heading">Denda:</span>
                                <h6 class="mb-0">{{ $lates_day }} Hari X Rp. {{ $penalty }}</h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="w-px-100 mb-0">Total:</h6>
                                <h6 class="mb-0">Rp. {{ $amount }}</h6>
                            </div>
                            <div class="my-5 text-center">
                                @include('penalty.penalty_transaction')
                                <div class="divider divider-primary">
                                    <div class="divider-text">Atau</div>
                                </div>
                                @include('penalty.createAndUpdate')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h6 class="card-title mb-4">Detail User</h6>
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <div class="avatar me-2 pe-1">
                            <img src="/assets/img/avatars/1.png" alt="Avatar" class="rounded-circle">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="app-user-view-account.html">
                                <h6 class="mb-1">{{ $transaction->user->name }}</h6>
                            </a>
                            <small>{{ $transaction->user->role }}</small>
                        </div>
                    </div>
                    <p class=" mb-1">Email : {{ $transaction->user->email }}</p>
                    <p class=" mb-0">Telp : {{ $transaction->user->telp }}</p>
                    <p class=" mb-0">NIS/NIP : {{ $transaction->user->identify }}</p>
                    <p class=" mb-0">Tanggal Lahir. : {{ $transaction->user->birthdate }}</p>
                    <p class=" mb-0">Jenis Kelamin : {{ $transaction->user->gender }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="card-title m-0">Detail Buku</h6>
                    <h6 class="m-0"><a href="{{ route('books.show', $transaction->book->id) }}">Lihat</a></h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-start align-items-center mb-4">
                        <div class="avatar me-2 pe-1">
                            <img src="{{ Storage::url($transaction->book->image) }}" alt="Avatar"
                                class="rounded-circle w-auto">
                        </div>
                        <div class="d-flex flex-column">
                            <a href="app-user-view-account.html">
                                <h6 class="mb-1">{{ $transaction->book->title }}</h6>
                            </a>
                            <small>{{ $transaction->book->category->name }}</small>
                        </div>
                    </div>
                    <p class=" mb-1">ISBN : {{ $transaction->book->isbn }}</p>
                    <p class=" mb-1">Penulis : {{ $transaction->book->author }}</p>
                    <p class=" mb-1">Penerbit : {{ $transaction->book->publisher }}</p>
                    <p class=" mb-1">Tahun Terbit : {{ $transaction->book->year_published }}</p>
                    <p class=" mb-1">Jumlah Buku : {{ $transaction->book->book_count }} Buku</p>
                    <p class=" mb-1">Sinopsis : {{ $transaction->book->synopsis }}</p>

                </div>
            </div>
        </div>
    </div>
</x-auth.layout>
