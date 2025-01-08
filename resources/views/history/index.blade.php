<x-guest.layout>
    <x-slot name="title">History Catalog Book</x-slot>
    @include('layouts.table')
    <div class="card mx-5 mt-1 shadow-none" style="background: transparent">
        <div class="card-header">
            <h5 class="mb-0">Riwayat Peminjaman Buku</h5>
            <p class="mb-3">Berikut data riwayat dari peminjaman buku {{ auth()->user()->name }}</p>
        </div>
        <div class="card-body">
            <div class="table-responsive border p-3 rounded">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Total Denda</th>
                            <th>Status Denda</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $item->borrow_date ?? '-' }}</td>
                                <td>{{ $item->return_date ?? '-' }}</td>
                                <td>{{ $item->status->name }}</td>
                                <td>Rp. {{ $item->penalty_total ?? '-' }}</td>
                                <td>
                                    @if ($item->penalties->first())
                                        {{ $item->penalties->first()->status }}
                                    @elseif (!$item->penalties->first() && $item->penalty_total > 0)
                                        Belum Dibayar
                                    @elseif ($item->penalty_total == 0)
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('penalties.show', $item->id) }}" class="btn btn-primary btn-sm">
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-guest.layout>
