<x-auth.layout>
    <x-slot name="title">Laporan Buku Perpustakaan</x-slot>
    @include('layouts.report')

    <div class="card">
        <h4 class="card-header fw-bold">Laporan Buku Perpustakaan</h4>
        <div class="card-body table-responsive">
            <table id="example" class="display table nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>judul</th>
                        <th>kategori buku</th>
                        <th>isbn</th>
                        <th>Penulis</th>
                        <th>tahun terbit</th>
                        <th>penerbit</th>
                        <th>jumlah buku</th>
                        <th>Sumber</th>
                        <th>Rak Buku</th>
                        <th>Harga Buku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $no => $book)
                        <tr>
                            <td>{{ ++$no }}.</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->category->name }}</td>
                            <td>{{ $book->isbn }}</td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->year_published }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>{{ $book->book_count }}</td>
                            <td>{{ $book->source }}</td>
                            <td>{{ $book->bookshelf }}</td>
                            <td>Rp. {{ $book->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-auth.layout>
