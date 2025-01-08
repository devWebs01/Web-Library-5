<x-auth.layout>
    <x-slot name="title">Confirmation Account</x-slot>
    @include('layouts.table')
    <div class="row mb-3 gy-3">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0">Total {{ $verified->count() }} users</p>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            @forelse ($verified->take(5) as $item)
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar pull-up" aria-label="{{ $item->name }}"
                                    data-bs-original-title="{{ $item->name }}">
                                    <img class="rounded-circle" src="/assets/img/avatars/6.png" alt="Avatar">
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="role-heading">
                            <h5 class="mb-1">Terkonfirmasi</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <p class="mb-0">Total {{ $non_verified->count() }} users</p>
                        <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                            @forelse ($non_verified->take(5) as $item)
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar pull-up" aria-label="{{ $item->name }}"
                                    data-bs-original-title="{{ $item->name }}">
                                    <img class="rounded-circle" src="/assets/img/avatars/6.png" alt="Avatar">
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                    <div class="d-flex justify-content-between align-items-end">
                        <div class="role-heading">
                            <h5 class="mb-1">Menunggu Konfirmasi</h5>

                        </div>
                    </div>
                </div>
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
                            <th>Action</th>
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
