<div class="container-fluid sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light py-4">
        <div class="container-fluid border rounded bg-white">
            <a class="navbar-brand" href="/">
                <img class="img-fluid" src="{{ asset('/assets/img/logo.png') }}" alt="" width="48px"
                    height="48px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav_lc"
                aria-controls="nav_lc" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="nav_lc">
                <ul class="navbar-nav my-3 my-lg-0 ms-lg-3 me-auto">
                    <li class="nav-item me-4">
                        <a class="nav-link fw-bold" href="/">Beranda</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link fw-bold" href="{{ route('catalog.index') }}">Koleksi
                            Buku</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link fw-bold" href="{{ route('member.profile') }}">
                            Profile User
                        </a>
                    </li>
                </ul>
                <div>
                    @auth
                        @if (auth()->user()->role == 'Anggota')
                            <a class="btn btn-primary me-2" href="{{ route('catalog.history') }}">Riwayat</a>
                            <a class="btn btn-danger me-2" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a class="btn btn-primary me-2" href="/home">Beranda Admin</a>
                        @endif
                    @else
                        <a class="btn btn-primary me-2" href="/login">Masuk</a>
                        <a class="btn btn-primary" href="/register">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

</div>
