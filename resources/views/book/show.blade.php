<?php

use function Livewire\Volt\{state};
use App\Models\Book;

state(['id', 'book']);

$deleteBook = function ($id) {
    $this->book->delete;

    if ($book = Book::find($id)) {
        $book->delete();

        session()->flash('success', 'Proses penghapusan data telah berhasil dilakukan.');

        $this->redirect('/books');
    } else {
        session()->flash('error', 'Buku tidak ditemukan.');
        $this->redirect('/books');
    }
};

?>

<x-auth.layout>
    <x-slot name="title">Book {{ $book->title }}</x-slot>

    <ul class="nav nav-pills mb-3 nav-pills nav-justified" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-show-tab" data-bs-toggle="pill" data-bs-target="#pills-show"
                type="button" role="tab" aria-controls="pills-show" aria-selected="true">Detail Data Buku</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-update-tab" data-bs-toggle="pill" data-bs-target="#pills-update"
                type="button" role="tab" aria-controls="pills-update" aria-selected="false">Ubah Data Buku</button>
        </li>
        <li class="nav-item" role="presentation">
            @volt
                <div>
                    <button class="nav-link" type="submit" wire:click="deleteBook({{ $book->id }})"
                        wire:confirm="Yakin ingin menghapus data buku ini?">Hapus Data Buku</button>
                </div>
            @endvolt
        </li>
    </ul>


    <div class="card">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-show" role="tabpanel" aria-labelledby="pills-show-tab"
                tabindex="0">
                <div class="card-header">
                    <h5 class="mb-0">Detail Buku</h5>
                    <p class="mb-0"> Informasi yang diberikan di bawahnya akan berkaitan dengan detail atau rincian
                        mengenai
                        suatu buku.</p>
                </div>
                <div class="card-body">
                    <div class="row gap-3">
                        <div class="col-md">
                            <div class="cursor-pointer row">
                                <img src="{{ Storage::url($book->image) }}" class="img rounded object-fit-cover"
                                    alt="cover book" width="100%" height="550px">
                            </div>
                        </div>
                        <div class="col-md">
                            <p class="mb-0 fw-semibold text-primary">{{ $book->category->name }}</p>
                            <h2 class="fw-bold text-wrap mb-3 lh-1">{{ $book->title }}</h2>
                            <p>{{ Str::limit($book->synopsis, 300, '...') }}</p>
                            <p class="text-wrap"><i class="mdi mdi-book-alphabet mdi-24px me-2"></i>Jenis Buku:
                                {{ $book->type }}</p>
                            <p class="text-wrap"><i class="mdi mdi-identifier mdi-24px me-2"></i>ISBN:
                                {{ $book->isbn }}</p>
                            <p class="text-wrap"><i class="mdi mdi-counter mdi-24px me-2"></i>Jumlah Buku:
                                {{ $book->book_count }}</p>
                            <p class="text-wrap"><i class="mdi mdi-face-man mdi-24px me-2"></i>Penulis:
                                {{ $book->author }}</p>
                            <p class="text-wrap"><i class="mdi mdi-clipboard-text-clock mdi-24px me-2"></i>Tahun
                                Terbit:
                                {{ $book->year_published }}</p>
                            <p class="text-wrap"><i class="mdi mdi-domain mdi-24px me-2"></i>Penerbit:
                                {{ $book->publisher }}</p>
                            <p class="text-wrap"><i class="mdi mdi-domain mdi-24px me-2"></i>Rak Buku:
                                {{ $book->bookshelf }}</p>
                            <p class="text-wrap"><i class="mdi mdi-clipboard-text mdi-24px me-2"></i>Sumber Buku:
                                {{ $book->source }}</p>
                            <p class="text-wrap"><i class="mdi mdi-book mdi-24px me-2"></i>Harga Buku:
                                {{ $book->price }}</p>

                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab"
                tabindex="0">
                <div class="card-body">
                    @include('book.update')
                </div>
            </div>

        </div>

    </div>
</x-auth.layout>
