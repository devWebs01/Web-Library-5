<x-auth.layout>
    <x-slot name="title">{{ $transaction->user->name }}</x-slot>
    <div class="card">
        <!-- Customer Content -->
        <div class="card-body">
            <div class="d-flex gap-3 mb-3 justify-content-between">
                <button class="btn btn-label-warning" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    ubah
                </button>
                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-label-danger">Hapus</button>
                </form>
            </div>

            <div class="collapse mb-3" id="collapseExample">
                <div class="card">
                    @include('transaction.update')
                </div>
            </div>
            <!-- Invoice table -->
            <div class="card mb-4">
                <div class="card-body table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Tgl. Pinjam</th>
                                <th scope="col">Tgl. Kembali</th>
                                <th scope="col">Buku</th>
                                <th scope="col">Status Transaksi</th>
                                <th scope="col">Total Denda</th>
                                <th scope="col">Status Denda</th>
                                @if ($transaction->status_id == '3')
                                    <th scope="col">Jumlah Terlambat (Hari)</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $transaction->borrow_date }}</td>
                                <td>{{ $transaction->return_date }}</td>
                                <td>{{ $transaction->book->title }}</td>
                                <td>
                                    {{ $transaction->status->name }}</td>
                                <td>Rp. {{ $transaction->penalty_total ?? '0' }}</td>
                                <td>
                                    @if ($transaction->penalties->first())
                                        {{ $transaction->penalties->first()->status }}
                                    @elseif (!$transaction->penalties->first() && $transaction->penalty_total >= 0)
                                        Belum Dibayar
                                    @elseif ($transaction->penalty_total == 0)
                                        -
                                    @endif
                                </td>
                                @if ($transaction->status_id == '3')
                                    <td>
                                        {{ $transaction->return_date <= now() ? Carbon\carbon::parse($transaction->return_date)->diffInDays(now()) : '0' }}
                                        Hari
                                    </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <!-- /Invoice table -->
        </div>
        <!--/ Customer Content -->

        <!-- Customer-detail Sidebar -->
        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="info-container">
                        <small class="d-block fw-normal text-uppercase text-muted text mb-3 border-bottom">Data
                            Siswa</small>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <span class="fw-medium me-2">Nama:</span>
                                <span>{{ $transaction->user->name }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Email:</span>
                                <span>{{ $transaction->user->email }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Role:</span>
                                <span class="badge bg-label-success">{{ $transaction->user->role }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Telp:</span>
                                <span>{{ $transaction->user->telp }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">NIS/NIP:</span>
                                <span>{{ $transaction->user->identify }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Jenis Kelamin:</span>
                                <span>{{ $transaction->user->gender }}</span>
                            </li>
                            <li class="mb-3">
                                <span class="fw-medium me-2">Tgl. Lahir:</span>
                                <span>{{ $transaction->user->birthdate }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <small class="d-block fw-normal text-uppercase text-muted text mb-3 border-bottom">Bukti
                        Pembayaran</small>
                    @if ($transaction->penalties->first())
                        <img src="{{ Storage::url($transaction->penalties->first()->image) ?? null }}
                    "
                            class="img-fluid rounded-top" alt="" />
                    @elseif (!$transaction->penalties->first() && $transaction->penalty_total > 0)
                        Belum Dibayar
                    @elseif ($transaction->penalty_total == 0)
                        Tidak dibutuhkan
                    @endif
                </div>
            </div>
        </div>
        <!--/ Customer Sidebar -->
    </div>

</x-auth.layout>
