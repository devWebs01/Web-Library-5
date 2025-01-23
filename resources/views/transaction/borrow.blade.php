<x-auth.layout>
    <x-slot name="title">Transaction Library</x-slot>
    @include('layouts.table')
    <div class="card mb-3">
        <h5 class="card-header mb-0 pb-0">Tambah Peminjaman Buku</h5>
        @include('transaction.store')

    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="text-center fw-bold">Tabel Peminjaman Buku</h5>
            <div class="table-responsive">
                <table id="example" class="display table nowrap text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>nama lengkap</th>
                            <th>status</th>
                            <th>Tanggal Pinjam - Kembali</th>
                            <th>Terlambat (Hari)</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $no => $item)
                            <tr>
                                <td>
                                    {{ ++$no }}.
                                </td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->status->name }}</td>
                                <td>
                                    {{ $item->borrow_date != null ? \Carbon\Carbon::parse($item->borrow_date)->format('d M Y') : '-' }}
                                    -
                                    {{ $item->return_date != null ? \Carbon\Carbon::parse($item->return_date)->format('d M Y') : '-' }}
                                </td>
                                <td>
                                    {{ $item->return_date <= now() ? Carbon\carbon::parse($item->return_date)->diffInDays(now()) : '0' }}
                                    Hari
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a class="btn btn-outline-primary btn-sm"
                                            href="{{ route('transactions.show', $item->id) }}" role="button">
                                            Detail Data
                                        </a>
                                        <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#modalId">
                                            Tindakan
                                        </button>
                                    </div>

                                    <!-- Modal trigger button -->

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static"
                                        data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">
                                                        Perbarui status pengembalian buku
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('transactions.action', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">

                                                        @livewire('status', ['statusId' => $item->id])
                                                    </div>
                                                    <div class="modal-footer row">
                                                        <button type="button" class="col-md btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Kembali
                                                        </button>
                                                        <button type="submit"
                                                            class="col-md btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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

