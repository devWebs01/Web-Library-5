<form action="{{ route('transactions.update', $transaction->id) }}" method="post">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md">
            <div class="mb-3">
                <label for="user_id" class="form-label">Nama Lengkap</label>
                <select class="form-select" name="user_id" id="user_id">
                    <option>Pilih satu</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $transaction->user->id == $user->id ? 'selected' : '' }}>
                            - {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3">
                <label for="book_id" class="form-label">Buku</label>
                <select class="form-select" name="book_id" id="book_id">
                    <option selected>Pilih satu</option>
                    @foreach ($books as $book)
                        <option
                            class="text-truncate
                            {{ $book->book_count == 0 ? 'text-danger' : '' }}"
                            value="{{ $book->id }}" {{ $book->book_count == 0 ? 'disabled' : '' }}
                            {{ $transaction->book->id == $book->id ? 'selected' : '' }}>-
                            {{ $book->title }} : {{ $book->book_count }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="mb-3">
                <label for="borrow_date" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" name="borrow_date" value="{{ $transaction->borrow_date }}"
                    id="borrow_date" aria-describedby="helpId" placeholder="borrow_date">
            </div>
        </div>
        <div class="col-md">
            <div class="mb-3">
                <label for="return_date" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" name="return_date" value="{{ $transaction->return_date }}"
                    id="return_date" aria-describedby="helpId" placeholder="return_date">
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status Transaksi</label>
        @livewire('status')
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

</form>
