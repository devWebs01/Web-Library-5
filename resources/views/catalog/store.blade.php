<!-- Modal trigger button -->
<button type="button" class="btn btn-primary w-100 btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
    Pinjam Buku
</button>

<!-- Modal Body -->
<div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
        <div class="modal-content">
            <form action="{{ route('catalog.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <h3 class="text-center fw-bold mb-2">Apakah Anda ingin melanjutkan dan memesan buku di perpustakaan?</h3>
                    <p class="text-center">Proses
                        peminjaman buku akan dilakukan setelah peminjam memenuhi syarat dan ketentuan yang berlaku di
                        perpustakaan.</p>

                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                    @endauth
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="status" value="Menunggu">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>
