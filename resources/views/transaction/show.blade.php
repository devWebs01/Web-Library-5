<?php

use function Livewire\Volt\{state};
use App\Models\Transaction;

state(['id', 'transaction']);

$deletetransaction = function ($id) {
    $this->transaction->delete;

    if ($transaction = Transaction::find($id)) {
        $transaction->delete();

        session()->flash('success', 'Proses penghapusan data telah berhasil dilakukan.');

        $this->redirect('/transactions/borrow');
    } else {
        session()->flash('error', 'Data tidak ditemukan, proses gagal.');
        $this->redirect('/transactions/borrow');
    }
};

?>

<x-auth.layout>
    <x-slot name="title">{{ $transaction->user->name }}</x-slot>

    <div class="row">

        <!-- Customer Content -->
        <div class="col-12">

            <div class="nav-align-top">
                <ul class="nav nav-pills mb-3 nav-pills nav-justified" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-show-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-show" type="button" role="tab" aria-controls="pills-show"
                            aria-selected="true">Detail Data</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-update-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-update" type="button" role="tab" aria-controls="pills-update"
                            aria-selected="false">Ubah Data</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        @volt
                            <div>
                                <button class="nav-link" type="submit"
                                    wire:click="deletetransaction({{ $transaction->id }})"
                                    wire:confirm="Yakin ingin menghapus data ini?">Hapus Data</button>
                            </div>
                        @endvolt
                    </li>

                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content p-0" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-show" role="tabpanel"
                            aria-labelledby="pills-show-tab" tabindex="0">

                            <small class="d-block fw-normal text-uppercase text-muted text mb-3 border-bottom">Data
                                Siswa</small>
                            <div class="info-container mb-5">

                                <ul class="list-unstyled">
                                    <div class="row">
                                        <div class="col-md">

                                            <li class="mb-3">
                                                <span class="fw-medium me-2">Nama:</span>
                                                <span>{{ $transaction->user->name }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">Email:</span>
                                                <span>{{ $transaction->user->email }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">Role:</span>
                                                <span
                                                    class="badge bg-label-success">{{ $transaction->user->role }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">Telp:</span>
                                                <span>{{ $transaction->user->telp }}</span>
                                            </li>

                                        </div>
                                        <div class="col-md">
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">NIS/NIP:</span>
                                                <span>{{ $transaction->user->identify }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">Jenis Kelamin:</span>
                                                <span>{{ $transaction->user->gender }}</span>
                                            </li>
                                            <li class="mb-3">
                                                <span class="fw-medium me-2">Tgl. Lahir:</span>
                                                <span>{{ $transaction->user->birthdate }}</span>
                                            </li>

                                        </div>
                                    </div>


                                </ul>
                            </div>

                            <div class="row">
                                <div class="col-md">

                                    <small
                                        class="d-block fw-normal text-uppercase text-muted text mb-3 border-bottom">Data
                                        Peminjaman Buku</small>

                                    <ul class="list-unstyled">
                                        <li class="mb-3">
                                            <strong>Tanggal Pinjam:</strong> {{ $transaction->borrow_date }}
                                        </li>
                                        <li class="mb-3">
                                            <strong>Tanggal Dikembalikan:</strong> {{ $transaction->return_date }}
                                        </li>
                                        <li class="mb-3">
                                            <strong>Buku:</strong> {{ $transaction->book->title }}
                                        </li>
                                        <li class="mb-3">
                                            <strong>Status Transaksi:</strong> {{ $transaction->status->name }}
                                        </li>
                                        <li class="mb-3">
                                            <strong>Total Denda:</strong> Rp. {{ $transaction->penalty_total ?? '0' }}
                                        </li>
                                        <li class="mb-3">
                                            <strong>Status Denda:</strong>
                                            @if ($transaction->penalties->first())
                                                {{ $transaction->penalties->first()->status }}
                                            @elseif (!$transaction->penalties->first() && $transaction->penalty_total >= 0)
                                                Belum Dibayar
                                            @elseif ($transaction->penalty_total == 0)
                                                -
                                            @endif
                                        </li>
                                        @if ($transaction->status_id == '3')
                                            <li>
                                                <strong>Jumlah Terlambat:</strong>
                                                {{ $transaction->return_date <= now() ? Carbon\Carbon::parse($transaction->return_date)->diffInDays(now()) : '0' }}
                                                Hari
                                            </li>
                                        @endif
                                    </ul>
                                </div>


                                <div class="col-md">
                                    <small
                                        class="d-block fw-normal text-uppercase text-muted text mb-3 border-bottom">Bukti
                                        Pembayaran Denda</small>
                                    @if ($transaction->penalties->first())
                                        <img src="{{ Storage::url($transaction->penalties->first()->image) ?? null }}
                    "
                                            class="img-fluid rounded-top" alt="" />
                                    @elseif (!$transaction->penalties->first() && $transaction->penalty_total > 0)
                                        Belum Dibayar
                                    @elseif ($transaction->penalty_total == 0)
                                        Tidak dibutuhkan
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-update" role="tabpanel" aria-labelledby="pills-update-tab"
                            tabindex="0">
                            <small class="d-block fw-normal text-uppercase text-muted text mb-3 border-bottom">Data
                                Peminjaman Buku</small>
                            @include('transaction.update')

                        </div>

                    </div>
                </div>
            </div>


        </div>
        <!--/ Customer Content -->
    </div>

</x-auth.layout>
