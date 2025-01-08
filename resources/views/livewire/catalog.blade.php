<div>
    <div class="card-header d-flex flex-wrap justify-content-between gap-3">
        <div class="card-title mb-0 me-1">
            <h5 class="mb-1">Katalog Buku</h5>
            <p class="mb-0">Total {{ $books->count() }} keseluruhan buku yang tersedia</p>
        </div>
        <div class="d-flex justify-content-md-end align-items-center gap-3 flex-wrap">
            <div class="position-relative">
                <select class="form-select" wire:model.live="category_id" name="" id="">
                    <option value="">Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ Str::limit($category->name, 35, '...') }}</option>
                    @endforeach
                </select>
            </div>

            <label class="switch">
                <input wire:model.live="search" type="text" class="form-control" name="" id=""
                    aria-describedby="helpId" placeholder="Masukkan judul buku ...">
            </label>
        </div>
    </div>
    <div class="card-body">
        <h5 class="mb-3 text-center fw-bold text-primary">
            <i wire:loading class="mdi mdi-loading mdi-spin mdi-36px text-primary"></i>
            {{ $search }}
        </h5>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">
            @foreach ($books as $book)
                <div class="col">
                    <a href="{{ route('catalog.show', $book->id) }}">
                        <div class="lc-block card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                            lc-helper="background"
                            style="background-image: url('{{ Storage::url($book->image) }}'); background-size:cover">
                            <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                                <div class="lc-block pt-5 mt-5 mb-4">
                                    <div editable="rich">
                                        <h2 class="display-3 lh-1 fw-bold text-black">{{ $book->title }}</h2>
                                        <p class="text-truncate text-black">{{ $book->synopsis }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
