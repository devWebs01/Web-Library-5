<x-auth.layout>
    <x-slot name="title">Transaction Library</x-slot>
    @include('layouts.table')
    <div class="card mb-3">
        <h5 class="card-header mb-0 pb-0">Tambah Peminjaman Buku</h5>
        @include('transaction.store')

    </div>

    <div class="card">
        <div class="card-body">
            <h4 class="text-center">Tabel Peminjaman Buku</h4>
            <div class="table-responsive">
                <table id="example" class="display table nowrap text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>nama lengkap</th>
                            <th>status Transaksi</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Jumlah Terlambat (Hari)</th>
                            <th>Tindakan</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('transactions.show', $item->id) }}" role="button">Lihat</a>
                                    </div>
                                </td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->status->name }}</td>
                                <td>
                                    {{ $item->borrow_date != null ? \Carbon\Carbon::parse($item->borrow_date)->format('d M Y') : '-' }}
                                </td>
                                <td>
                                    {{ $item->return_date != null ? \Carbon\Carbon::parse($item->return_date)->format('d M Y') : '-' }}
                                </td>
                                <td>
                                    {{ $item->return_date <= now() ? Carbon\carbon::parse($item->return_date)->diffInDays(now()) : '0' }}
                                    Hari
                                </td>
                                <form action="{{ route('transactions.action', $item->id) }}" method="post">
                                    <td>
                                        <div style="width: 120px">
                                            @csrf
                                            @method('PUT')
                                            <div class="row d-block">
                                                @livewire('status', ['statusId' => $item->id])
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Submit
                                        </button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- <div class="card">
        <div class="card-header">
            <div class="nav-align-top">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-waiting" aria-controls="navs-justified-waiting"
                            aria-selected="true"><i
                                class="tf-icons mdi mdi-receipt-text-clock-outline mdi-20px me-1"></i> Menunggu
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-walking" aria-controls="navs-justified-walking"
                            aria-selected="false"><i class="tf-icons mdi mdi-timer-sand-complete mdi-20px me-1"></i>
                            Berjalan
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-penalty" aria-controls="navs-justified-penalty"
                            aria-selected="false"><i class="tf-icons mdi mdi-alert-box-outline mdi-20px me-1"></i>
                            Terlambat
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-justified-finished" aria-controls="navs-justified-finished"
                            aria-selected="false"><i class="tf-icons mdi mdi-tag-check mdi-20px me-1"></i>
                            Selesai
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane fade show active" id="navs-justified-waiting" role="tabpanel">
                    <div class="card-body">
                        @include('transaction.table.index')
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-walking" role="tabpanel">
                    <div class="card-body">
                        @include('transaction.table.walking')
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-penalty" role="tabpanel">
                    <div class="card-body">
                        @include('transaction.table.penalty')
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-justified-finished" role="tabpanel">
                    <div class="card-body">
                        @include('transaction.table.finished')
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-auth.layout>
