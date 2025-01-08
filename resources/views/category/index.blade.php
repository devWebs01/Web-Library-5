<x-auth.layout>
    @include('layouts.table')
    <x-slot name="title">Categories Book</x-slot>
    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm">Selamat {{ Auth()->user()->name }}! 🎉</h4>
                    <p class="mb-0">Kamu mempunyai {{ $count }} buku yang terdaftar dalam
                        {{ $categories->count() }} kategori buku saat ini.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center align-self-end">
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/front-pages/landing-page/sitting-girl-with-laptop.png"
                    class="card-img-position bottom-0 w-25 end-0 scaleX-n1-rtl " alt="View Profile">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            @include('category.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Buku</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $no => $category)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->books->count() }} Buku</td>
                                <td>
                                    <div class="d-flex gap-3 align-items-center justify-content-center">
                                        @include('category.update')
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit">
                                                Hapus</button>
                                        </form>
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
