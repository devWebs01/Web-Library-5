<x-auth.layout>
    <x-slot name="title">Laporan Peminjaman Buku</x-slot>
    @include('layouts.report')
    <div class="card">
        <h4 class="card-header fw-bold">Laporan Peminjaman Buku</h4>
        <div class="card-body table-responsive">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $no => $item)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->book->title }}</td>
                            <td>{{ Carbon\carbon::parse($item->borrow_date)->format('d M Y') }}</td>
                            <td>{{ Carbon\carbon::parse($item->return_date)->format('d M Y') }}</td>
                            <td>
                                {{ $item->status->name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth.layout>
