<div class="text-start">
    <form action="{{ route('penalties.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Input Bukti Pembayaran Denda</label>
            <input type="file" class="form-control" name="image" />
            <input type="hidden" name="transaction_id" value="{{ $item->id }}">
            <input type="hidden" name="status" value="Lunas">
        </div>

        <div class="row mb-3 gap-5 mt-5">
            <button type="button" class="col-md btn btn-secondary" data-bs-dismiss="modal">
                Kembali
            </button>
            <button type="submit" class="col-md btn btn-primary">
                Submit
            </button>
        </div>
    </form>

</div>
