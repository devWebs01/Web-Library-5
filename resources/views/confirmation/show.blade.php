<div class="modal fade" id="show-{{ $user->slug }}" aria-hidden="true" aria-labelledby="show-{{ $user->slug }}Label"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <h5 class="mb-0">Informasi Pengguna</h5>
                <p>Pengguna terdaftar sejak {{ $user->created_at }}</p>
                <div class="row">
                    <div class="col-md">
                        <ul class="list-unstyled">
                            <li>
                                <span class="fw-bold">Nama lengkap: </span> {{ $user->name }}
                            </li>
                            <li>
                                <span class="fw-bold">NIS/NIP: </span> {{ $user->identify }}
                            </li>
                            <li>
                                <span class="fw-bold">Role: </span> {{ $user->role }}
                            </li>
                            <li>
                                <span class="fw-bold">Role: </span>
                                {{ Carbon\Carbon::parse($user->birthdate)->format('d, M Y') }}
                            </li>
                        </ul>
                    </div>
                    <div class="col-md">
                        <ul class="list-unstyled">
                            <li>
                                <span class="fw-bold">Email: </span> {{ $user->email }}
                            </li>
                            <li>
                                <span class="fw-bold">Telp: </span> {{ $user->telp }}
                            </li>
                            <li>
                                <span class="fw-bold">Jenis Kelamin: </span> {{ $user->gender }}
                            </li>
                            <li>
                                <span class="fw-bold">Status: </span> {{ $user->status }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-danger" data-bs-target="#show-{{ $user->slug }}-destroy"
                    data-bs-toggle="modal">Tolak</button>
                <button class="btn btn-success" data-bs-target="#show-{{ $user->slug }}-confirmation"
                    data-bs-toggle="modal">Terima</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-{{ $user->slug }}-destroy" aria-hidden="true"
    aria-labelledby="show-{{ $user->slug }}-destroy" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="text-wrap: wrap;">
                    <h5>Yakin ingin menolak <strong class="text-danger">{{ $user->name }}</strong>
                        sebagai
                        anggota
                        perpustakaan?</h5>
                    <p>Setelah di tolak akun akan dihapus dari sistem.</p>
                </div>
            </div>
            <div class="modal-footer row">
                <form action="{{ route('users.destroy', $user->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show-{{ $user->slug }}-confirmation" aria-hidden="true"
    aria-labelledby="show-{{ $user->slug }}-confirmation" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="text-wrap: wrap;">
                    <h5>Yakin ingin menerima pengguna <strong class="text-success">{{ $user->name }}</strong> sebagai
                        anggota perpustakaan?</h5>
                    <p>Setelah ini pengguna resmi menjadi anggota perpustakaan.</p>
                </div>
            </div>
            <div class="modal-footer row">
                <form action="{{ route('confirmations.accept', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Terima</button>
                </form>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" href="#show-{{ $user->slug }}"
    role="button">Detail</a>
