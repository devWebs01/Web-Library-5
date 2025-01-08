<x-auth.layout>
    <x-slot name="title"></x-slot>
    <div class="row fv-plugins-icon-container">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row gap-2 gap-lg-0">
                <li class="nav-item">
                    <a class="nav-link active waves-effect waves-light" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-account" aria-controls="navs-pills-top-account"
                        aria-selected="true"><i class="mdi mdi-account-outline mdi-20px me-1"></i>
                        Data Akun
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-security" aria-controls="navs-pills-top-security"
                        aria-selected="true"><i class="mdi mdi-lock-open-outline mdi-20px me-1"></i>
                        Keamanan
                    </a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="navs-pills-top-account" role="tabpanel">
                <div class="card mb-4">
                    <h4 class="card-header">Detail Profil</h4>
                    <!-- Account -->
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" class="fv-plugins-bootstrap5 fv-plugins-framework"
                            action="{{ route('profile.account', $user->id) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="role" value="Anggota">
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ $user->name }}" id="name"
                                            placeholder="Enter your name" autofocus />
                                        <label for="name">Nama Lengkap</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ $user->email }}" placeholder="Enter your email" />
                                        <label for="email">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                            name="telp" value="{{ $user->telp }}" id="telp"
                                            placeholder="Enter your telp" autofocus />
                                        <label for="telp">Telp</label>
                                        @error('telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="number"
                                            class="form-control @error('identify') is-invalid @enderror" name="identify"
                                            value="{{ $user->identify }}" id="identify"
                                            placeholder="Enter your identify" autofocus />
                                        <label for="identify">NIS/NIP</label>
                                        @error('identify')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <select class="form-select form-control @error('gender') is-invalid @enderror"
                                            name="gender" id="gender">
                                            <option disabled>Pilih satu</option>
                                            <option value="Laki-laki"
                                                {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan"
                                                {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        <label for="gender">Jenis Kelamin</label>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="date"
                                            class="form-control @error('birthdate') is-invalid @enderror"
                                            name="birthdate" value="{{ $user->birthdate }}" id="birthdate"
                                            placeholder="Enter your birthdate" autofocus />
                                        <label for="birthdate">Tanggal Lahir</label>
                                        @error('birthdate')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Simpan
                                    Perubahan</button>
                                <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <div class="tab-pane fade" id="navs-pills-top-security" role="tabpanel">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Ubah Password</h4>
                        <ul class="list-unstyled">
                            <li>1. Panjang minimal 8 karakter - semakin banyak, semakin baik
                            </li>
                            <li>2. Setidaknya satu karakter huruf kecil
                            </li>
                            <li>3. Setidaknya satu angka, simbol, atau karakter spasi putih
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        @include('auth.profile.password')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-auth.layout>
