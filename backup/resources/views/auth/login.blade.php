@extends('layout.app')

@section('content')
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background: linear-gradient(180deg, #0d6efdff, #a10404ff);">
            <div class="card-header py-4 text-white text-center border-0" style="background-color: #0d6efdff !important;">
                <i class="bi bi-person-circle fs-1 mb-2"></i>
                <h4 class="fw-bold mb-0">Login Member</h4>
            </div>
            <div class="card-body p-4 p-lg-5">
                @if(session('error'))
                    <div class="alert alert-danger border-0 small mb-4 shadow-sm">{{ session('error') }}</div>
                @endif
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">ALAMAT EMAIL</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary border-end-0 text-secondary"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control bg-dark border-secondary border-start-0 text-light" placeholder="email@example.com" required>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">PASSWORD</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark border-secondary border-end-0 text-secondary"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control bg-dark border-secondary border-start-0 text-light" placeholder="••••••••" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold rounded-pill mt-2">LOGIN SEKARANG</button>
                </form>
                <div class="mt-4 text-center">
                    <p class="small text-secondary mb-0">Belum punya akun? <a href="{{ route('register') }}" class="text-primary fw-semibold text-decoration-none border-bottom border-primary border-2">Daftar Member</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection