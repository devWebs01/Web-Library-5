<x-auth.layout>
    <x-slot name="title">Confirmation Account</x-slot>
    @include('layouts.table')

    <div class="card mb-3">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card-body">
                    <h4 class="card-title display-6 mb-4 text-truncate lh-sm fw-bold">
                        Data Konfirmasi User
                    </h4>
                    <p class="mb-0">Kamu mempunyai
                        <span class="text-primary">
                            {{ $non_verified->count() }} anggota
                        </span>
                        yang perlu di konfirmasi/tidak.
                    </p>
                </div>
            </div>
            <div class="col-12 col-md-6 position-relative align-self-center d-none d-md-block">
                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                    @forelse ($non_verified->take(5) as $item)
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
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>nama lengkap</th>
                            <th>NIS/NIP</th>
                            <th>role</th>
                            <th>status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $no => $user)
                            <tr>
                                <td>{{ ++$no }}.</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->identify }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->status }}</td>
                                <td>
                                    <div class="d-flex gap-3 justify-content-center">
                                        @include('confirmation.show')
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
