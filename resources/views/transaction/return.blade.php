<x-auth.layout>
    <x-slot name="title">Transaction Library</x-slot>
    @include('layouts.table')
    <div class="card mb-3">
        <div class="card">
            <div class="card-body">
                <h4 class="text-center">Tabel Pengembalian Buku</h4>
                <div class="table-responsive">
                    <table id="example" class="display table nowrap text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>nama lengkap</th>
                                <th>status</th>
                                <th>Tanggal Pinjam - Kembali</th>
                                <th>Denda</th>

                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $no => $item)
                                <tr>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->status->name }}</td>
                                    <td>
                                        {{ $item->borrow_date != null ? \Carbon\Carbon::parse($item->borrow_date)->format('d M Y') : '-' }}
                                        -
                                        {{ $item->return_date != null ? \Carbon\Carbon::parse($item->return_date)->format('d M Y') : '-' }}
                                    </td>
                                    <td>
                                        {{ $item->penalty_total && $item->status != '4' ? 'Rp. ' . $item->penalty_total : '-' }}
                                        -
                                        @if ($item->penalties->first())
                                            {{ $item->penalties->first()->status }}
                                        @elseif (!$item->penalties->first() && $item->penalty_total > 0)
                                            Belum Dibayar
                                        @elseif ($item->penalty_total == 0)
                                            -
                                        @endif
                                    </td> <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        @if (!$item->penalties->first() && $item->penalty_total > 0)
                                            <a class="btn btn-danger btn-sm"
                                                href="{{ route('penalties.create', $item->id) }}"
                                                role="button">Bayar</a>
                                        @endif
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('transactions.show', $item->id) }}" role="button">Lihat</a>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</x-auth.layout>
