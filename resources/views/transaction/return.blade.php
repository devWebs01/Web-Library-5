<x-auth.layout>
    <x-slot name="title">Transaction Library</x-slot>
    @include('layouts.table')

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('returnChart').getContext('2d');
            const returnChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Seminggu Terakhir', 'Sebulan Terakhir'],
                    datasets: [{
                        label: 'Jumlah Buku Dikembalikan',
                        data: [{{ $weeklyReturns }}, {{ $monthlyReturns }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 99, 132, 0.6)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endpush


    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm fw-bold">
                        Data Pengembalian Buku
                    </h4>
                    <p class="mb-0">Perpustakaan memiliki total {{ $transactions->count() }} transaksi pengembalian
                        buku</p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative text-center align-self-end d-none d-md-block">
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/front-pages/landing-page/sitting-girl-with-laptop.png"
                    class="card-img-position bottom-0 w-25 end-0 scaleX-n1-rtl" alt="View Profile">
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="container">
                <h5 class="mb-4 fw-bold text-center">Data Buku yang Dikembalikan</h5>

                <canvas id="returnChart" width="400" height="200"></canvas>


            </div>
        </div>

        <div class="card-body">
            <h5 class="text-center fw-bold">Tabel Pengembalian Buku</h4>
                <div class="table-responsive">
                    <table id="example" class="display table nowrap text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>nama lengkap</th>
                                <th>status</th>
                                <th>Tanggal Pinjam - Kembali</th>
                                <th>Denda</th>

                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $no => $item)
                                <tr>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->status->name }}</td>
                                    <td>
                                        {{ $item->borrow_date != null ? \Carbon\Carbon::parse($item->borrow_date)->format('d M Y') : '-' }}
                                        -
                                        {{ $item->return_date != null ? \Carbon\Carbon::parse($item->return_date)->format('d M Y') : '-' }}
                                    </td>
                                    <td>
                                        {{ $item->penalty_total && $item->status != '4' ? 'Rp. ' . $item->penalty_total : '-' }}
                                        -
                                        @if ($item->penalties->first())
                                            {{ $item->penalties->first()->status }}
                                        @elseif (!$item->penalties->first() && $item->penalty_total > 0)
                                            Belum Dibayar
                                        @elseif ($item->penalty_total == 0)
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            @if (!$item->penalties->first() && $item->penalty_total > 0)
                                                <a class="btn btn-outline-danger btn-sm text-danger"
                                                    data-bs-toggle="modal" data-bs-target="#modalId">Bayar</a>
                                                <div class="modal fade" id="modalId" tabindex="-1"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitleId">
                                                                    Input bukti pembayaran
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                @include('penalty.create')
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <a class="btn btn-outline-primary btn-sm"
                                                href="{{ route('transactions.show', $item->id) }}"
                                                role="button">Lihat</a>
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
