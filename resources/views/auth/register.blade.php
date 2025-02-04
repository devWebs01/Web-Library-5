<x-auth>
    <x-slot name="title">Register Pages</x-slot>
    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4">
                @if (session('success'))
                    <div class="alert alert-primary alert-dismissible mb-3" role="alert">
                        <h4 class="alert-heading d-flex align-items-center"><i
                                class="mdi mdi-check-circle-outline mdi-24px me-2"></i>Berhasil :)</h4>
                        <hr>
                        <p class="mb-0">{{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @elseif ($errors->any())
                    <div class="alert alert-danger alert-dismissible mb-3" role="alert">
                        <h4 class="alert-heading d-flex align-items-center"><i
                                class="mdi mdi-close-circle mdi-24px me-2"></i>Errors :(</h4>

                        <hr>
                        @foreach ($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                <!-- Register Card -->
                <div class="card p-2 shadow-none bg-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="/" class="app-brand-link gap-2">
                            <img class="img-fluid" src="{{ asset('/assets/img/logo.png') }}" alt=""
                                width="28px" height="28px">
                            <span class="app-brand-text demo text-heading fw-semibold">SI-Perpus</span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <div class="card-body mt-2">
                        <h4 class="mb-2">Pinjam Buku di Perpustakaan 🚀</h4>
                        <p class="mb-4">Buat peminjaman buku mu lebih asuk sekarang</p>

                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <input type="hidden" name="role" value="Anggota">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="number"
                                            class="form-control @error('identify') is-invalid @enderror" name="identify"
                                            value="{{ old('identify') }}" id="identify"
                                            placeholder="Enter your identify" autofocus />
                                        <label for="identify">NIS/NIP</label>
                                        @error('identify')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}" id="name"
                                            placeholder="Enter your name" autofocus />
                                        <label for="name">Nama Lengkap</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" placeholder="Enter your email" />
                                        <label for="email">Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3 form-password-toggle">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="password" id="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" />
                                                <label for="password">Password</label>
                                            </div>
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="mdi mdi-eye-off-outline"></i></span>
                                        </div>
                                        @error('password')
                                            <small class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-password-toggle">
                                        <div class="input-group input-group-merge">
                                            <div class="form-floating form-floating-outline">
                                                <input type="password" id="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="password" />
                                                <label for="password">{{ __('Ulangi Password') }}</label>
                                            </div>
                                            <span class="input-group-text cursor-pointer"><i
                                                    class="mdi mdi-eye-off-outline"></i></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="number" class="form-control @error('telp') is-invalid @enderror"
                                            name="telp" value="{{ old('telp') }}" id="telp"
                                            placeholder="Enter your telp" autofocus />
                                        <label for="telp">Telp</label>
                                        @error('telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <select class="form-select form-control @error('gender') is-invalid @enderror"
                                            name="gender" id="gender">
                                            <option selected disabled>Pilih satu</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <label for="gender">Jenis Kelamin</label>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline mb-3">
                                        <input type="date"
                                            class="form-control @error('birthdate') is-invalid @enderror"
                                            name="birthdate" value="{{ old('birthdate') }}" id="birthdate"
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

                            <div class="row mb-3">
                                <div class="form-floating form-floating-outline mb-3">
                                    <select class="form-select form-control @error('status') is-invalid @enderror"
                                        name="status" id="status">
                                        <option selected disabled>Pilih satu</option>
                                        <option value="Siswa">Siswa</option>
                                        <option value="Guru">Guru</option>
                                    </select>
                                    <label for="status">Status</label>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-conditions"
                                        name="terms" />
                                    <label class="form-check-label" for="terms-conditions">
                                        Saya setuju dengan
                                        <a href="javascript:void(0);">kebijakan & ketentuan dari pihak perpustakaan</a>
                                    </label>
                                </div>
                            </div>
                            <button class="btn btn-primary d-grid w-100">Daftar</button>
                        </form>

                        <p class="text-center">
                            <span>Sudah Punya Akun?</span>
                            <a href="/login">
                                <span>Login Sekarang</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->

            </div>
        </div>
    </div>
</x-auth>
