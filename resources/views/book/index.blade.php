<x-auth.layout>
    @include('layouts.table')
    <x-slot name="title">Books</x-slot>
    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm">{{ Auth()->user()->name }}, Periksa Segera!
                    </h4>
                    <p class="mb-0">Perpustakaan memiliki total {{ $transactions->count() }} transaksi peminjaman buku
                        dari total {{ $books->count() }} buku saat ini.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center align-self-end">
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/front-pages/landing-page/sitting-girl-with-laptop.png"
                    class="card-img-position bottom-0 w-25 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            @include('book.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>judul</th>
                            <th>Jenis buku</th>
                            <th>stok buku</th>
                            <th>kategori buku</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $no => $book)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->type }}</td>
                                <td>{{ $book->book_count }}</td>
                                <td><span class="badge bg-primary">{{ $book->category->name }}</span></td>
                                <td>
                                    <a class="btn btn-outline-primary btn-sm"
                                        href="{{ route('books.show', $book->id) }}" role="button">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-auth.layout>
