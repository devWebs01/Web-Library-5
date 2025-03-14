<x-guest.layout>
    <x-slot name="title">History Catalog Book</x-slot>
    @include('layouts.table')
    <div class="card bg-body p-4">
        <div class="card-body">
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
                                            <th>Status</th>
                                            <th>Denda</th>
                                            <th>Status Denda</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td>{{ $transaction->borrow_date ?? '-' }}</td>
                                            <td>{{ $transaction->return_date ?? '-' }}</td>
                                            <td>{{ $transaction->status->name }}</td>
                                            <td>Rp. {{ $transaction->penalty_total ?? '0' }}</td>
                                            <td>
                                                @if ($transaction->penalties->first())
                                                    {{ $transaction->penalties->first()->status }}
                                                @elseif (!$transaction->penalties->first() && $transaction->penalty_total > 0)
                                                    Belum Dibayar
                                                @elseif ($transaction->penalty_total == 0)
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="justify-content-between m-5 p-1">
                                @if ($transaction->penalties->first())
                                    <div class="container text-center">
                                        <small class="d-block fw-normal text-uppercase text-muted">Bukti
                                            Pembayaran</small>
                                        <img src="{{ Storage::url($transaction->penalties->first()->image) }}"
                                            class="img-fluid rounded" alt="" />
                                    </div>
                                @elseif($transaction->return_date != null)
                                    <form action="{{ route('penalties.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Input Bukti Pembayaran
                                                Denda</label>
                                            <input type="file" class="form-control" name="image" />
                                            <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                            <input type="hidden" name="status" value="Lunas">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                @endif

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
                                    <img src="https://api.dicebear.com/9.x/adventurer-neutral/svg?seed={{ $transaction->user->name }}"
                                        alt="Avatar" class="rounded-circle">
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
        </div>
    </div>

</x-guest.layout>