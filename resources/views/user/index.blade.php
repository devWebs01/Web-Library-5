<x-auth.layout>
    @include('layouts.table')
    <x-slot name="title">Users</x-slot>
    <div class="row mb-3 gy-3">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="card-body">
                                <h4 class="card-title display-6 mb-4 text-truncate lh-sm fw-bold">
                                    Data User
                                </h4>
                                <p class="mb-0">Kamu mempunyai
                                    <span class="text-primary">
                                        {{ $member->count() }} anggota
                                    </span>
                                    yang terdaftar saat ini.
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 position-relative align-self-center d-none d-md-block">
                            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 justify-content-end">
                                @forelse ($member->take(5) as $item)
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                        class="avatar pull-up" aria-label="{{ $item->name }}"
                                        data-bs-original-title="{{ $item->name }}">
                                        <img class="rounded-circle"
                                            src="https://api.dicebear.com/9.x/adventurer-neutral/svg?seed={{ $item->name }}"
                                            alt="Avatar">
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            @include('user.store')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS/NIP</th>
                            <th>Nama Lengkap</th>
                            <th>role</th>
                            <th>status</th>
                            <th>telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $no => $user)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $user->identify }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $user->role }}</span>
                                </td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->telp }}</td>
                                <td>
                                    <div class="d-flex gap-3 align-items-center justify-content-center">

                                        @include('user.update')
                                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit">
                                                Hapus</button>
                                        </form>
                                        <a class="btn btn-outline-primary btn-sm"
                                            href="{{ route('users.show', $user->slug) }}" role="button">Lihat</a>
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
