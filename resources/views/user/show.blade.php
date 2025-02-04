<x-auth.layout>
    @include('layouts.table')

    <x-slot name="title">User ({{ $user->name }})</x-slot>

    <div class="card">
        <h4 class="mb-3 card-header">Riwayat Peminjaman</h4>
        <div class="card">
            <!-- Card Body -->
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="position-relative">
                        <img src="https://api.dicebear.com/9.x/adventurer-neutral/svg?seed={{ $user->name }}"
                            alt="Profile Picture" class="rounded-circle avatar-xl">
                    </div>
                    <div class="ms-4 row">
                        <h4 class="mb-0 fw-bold">{{ $user->name }}</h4>
                        <div class="col-md">
                            <small class="text-secondary mb-3 lh-1 d-flex align-baseline">
                                NIS/NIP: {{ $user->identify ?? '-' }}
                            </small>
                            <small class="text-secondary mb-3 lh-1 d-flex align-baseline">
                                Email: {{ $user->email ?? '-' }}
                            </small>
                            <small class="text-secondary mb-3 lh-1 d-flex align-baseline">
                                Nomor Telepon: {{ $user->telp ?? '-' }}
                            </small>
                        </div>
                        <div class="col-md">
                            <small class="text-secondary mb-3 lh-1 d-flex align-baseline">
                                Tanggal Lahir:
                                {{ $user->birthdate ? \Carbon\Carbon::parse($user->birthdate)->format('d M Y') : '-' }}
                            </small>
                            <small class="text-secondary mb-3 lh-1 d-flex align-baseline">
                                Jenis Kelamin:
                                {{ $user->gender }}
                            </small>
                            <small class="text-secondary mb-3 lh-1 d-flex align-baseline">
                                Anggota Sejak: {{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}
                            </small>
                        </div>

                    </div>
                </div>

                <!-- Statistik Peminjaman -->
                <div class="border-top row mt-3 border-bottom mb-3 g-0">
                    <div class="col">
                        <div class="pe-1 ps-2 py-3">
                            <h3 class="mb-0 fw-bold">{{ $user->transactions->where('status_id', 2)->count() }}</h3>
                            <span>Buku Dipinjam</span>
                        </div>
                    </div>
                    <div class="col border-start">
                        <div class="pe-1 ps-3 py-3">
                            <h3 class="mb-0 fw-bold">{{ $user->transactions->where('status_id', 4)->count() }}</h3>
                            <span>Buku Dikembalikan</span>
                        </div>
                    </div>
                    <div class="col border-start">
                        <div class="pe-1 ps-3 py-3">
                            <h3 class="mb-0 fw-bold">
                                {{ $user->transactions->whereNotIn('status_id', [1, 2, 4])->count() }}
                            </h3>
                            <span>Denda</span>
                        </div>
                    </div>
                </div>
            </div>

            @if ($user->role == 'Anggota')
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display table nowrap text-center" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>Status</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $no => $item)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>{{ $item->user->name ?? '-' }}</td>
                                        <td>{{ $item->status->name }}</td>
                                        <td>{{ $item->borrow_date ?? '-' }}</td>
                                        <td>{{ $item->return_date ?? '-' }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <a class="btn btn-primary btn-sm"
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
            @endif
        </div>
    </div>
</x-auth.layout>
