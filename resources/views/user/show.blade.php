<x-auth.layout>
    @include('layouts.table')

    <x-slot name="title">User ({{ $user->name }})</x-slot>
    <div class="card">
        <div class="card-header pb-0">
            <h4 class="mb-3">Profil Pengguna</h4>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md">
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="text" class="form-control
                                name="name"
                            value="{{ $user->name }}" id="name" disabled placeholder="Enter your name"
                            autofocus />
                        <label for="name">Nama Lengkap</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="text" class="form-control
                                name="email"
                            value="{{ $user->email }}" disabled placeholder="Enter your email" />
                        <label for="email">Email</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="number" class="form-control
                                name="telp"
                            value="{{ $user->telp }}" id="telp" disabled placeholder="Enter your telp"
                            autofocus />
                        <label for="telp">Telp</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="number" class="form-control" name="identify" value="{{ $user->identify }}"
                            id="identify" disabled placeholder="Enter your identify" autofocus />
                        <label for="identify">NIS/NIP</label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md">
                    <div class="form-floating form-floating-outline mb-3">
                        <select class="form-select form-control" name="gender" id="gender" disabled>
                            <option disabled>Pilih satu</option>
                            <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        <label for="gender">Jenis Kelamin</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating form-floating-outline mb-3">
                        <input type="date" class="form-control
                                name="birthdate"
                            value="{{ $user->birthdate }}" id="birthdate" disabled placeholder="Enter your birthdate"
                            autofocus />
                        <label for="birthdate">Tanggal Lahir</label>
                    </div>
                </div>
                <div class="col-md">
                    <div class="form-floating form-floating-outline mb-3">
                        <select class="form-select form-control" name="role" id="role" disabled>
                            <option disabled>Pilih satu</option>
                            <option value="Anggota" {{ $user->role == 'Anggota' ? '' : '' }}>Anggota
                            </option>
                            <option value="Petugas" {{ $user->role == 'Petugas' ? '' : '' }}>Petugas</option>
                        </select>
                        <label for="role">Role</label>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-floating form-floating-outline mb-3">
                    <select class="form-select form-control @error('status') is-invalid @enderror" name="status"
                        id="status" disabled>
                        <option selected disabled>Pilih satu</option>
                        <option value="Siswa" {{ $user->status === 'Siswa' ? 'selected' : '' }}>Siswa
                        </option>
                        <option value="Guru" {{ $user->status === 'Guru' ? 'selected' : '' }}>Guru</option>
                    </select>
                    <label for="status">Status</label>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        @if ($user->role == 'Anggota')
            <div class="card-body">
                <h4 class="mb-3">Riwayat Peminjaman</h4>
                <div class="table-responsive">
                    <table id="example" class="display table nowrap text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Lengkap</th>
                                <th>status</th>
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
                                    <td>
                                        {{ $item->status->name }}
                                    </td>
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
</x-auth.layout>
