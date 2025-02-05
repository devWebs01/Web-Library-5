<?php

use function Livewire\Volt\{state};
use App\Models\Transaction;
use App\Models\Penalty;

state([
    'item',
]);

$dontHaveReceipt = function ($id) {

    Penalty::create([
        'transaction_id' => $id,
        'status' => 'Lunas',
    ]);

    if (Auth()->user()->role == 'Anggota') {
        return back();
    } else {
        return redirect()->route('transactions.return');
    }
};

?>


@volt
    <div>
        <div class="text-start">
            <form action="{{ route('penalties.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Input Bukti Pembayaran Denda</label>
                    <input type="file" class="form-control" name="image" />
                    <input type="hidden" name="transaction_id" value="{{ $item->id }}">
                    <input type="hidden" name="status" value="Lunas">
                </div>

                <div class="d-flex justify-content-between mb-3 gap-5 mt-5">
                    <button type="button" class="w-100 btn btn-secondary" wire:click='dontHaveReceipt({{ $item->id }})'>
                        Tanpa Bukti Pembayaran
                    </button>
                    <button type="submit" class="w-100 btn btn-primary">
                        Submit
                    </button>
                </div>
            </form>

        </div>

    </div>
@endvolt
