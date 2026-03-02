<nav class="navbar navbar-expand-lg navbar-dark border-bottom border-dark" style="background-color: #181818;">
    <div class="container py-2">
        <a class="navbar-brand fw-bold text-light d-flex align-items-center" href="{{ url('/') }}">
            <i class="bi bi-book-half me-2 text-primary"></i> 
            <span style="background: linear-gradient(90deg, #0d6efdff, #a10404ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Perpus Ghiffari
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active fw-semibold' : '' }}" href="{{ route('books.index') }}">Koleksi Buku</a>
                </li>
                @if(Auth::check() && Auth::user()->role == 'admin')
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('users.*') ? 'active fw-semibold' : '' }}" href="{{ route('users.index') }}">User Management</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transactions.*') ? 'active fw-semibold' : '' }}" href="{{ route('transactions.index') }}">Transaksi</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-lg-center">
                @auth
                    <li class="nav-item me-3 mb-2 mb-lg-0">
                        <span class="text-secondary small">Hello, <span class="text-light fw-medium">{{ Auth::user()->name }}</span></span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm px-3 rounded-pill fw-medium">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-light btn-sm px-4 rounded-pill fw-medium" href="{{ route('login') }}">Login</a>
                    </li>
                    @if(Route::has('register'))
                        <li class="nav-item mt-2 mt-lg-0">
                            <a class="btn btn-primary btn-sm px-4 rounded-pill fw-medium" style="background: linear-gradient(90deg, #0d6efdff, #a10404ff)" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </div>
</nav>