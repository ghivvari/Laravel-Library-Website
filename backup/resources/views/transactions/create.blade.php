@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-primary py-3 text-white">
                <h5 class="mb-0 fw-bold"><i class="bi bi-journal-plus me-2"></i> Pinjam Buku Baru</h5>
            </div>
            <div class="card-body p-4 p-lg-5">
                <form action="{{ route('transactions.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">PILIH BUKU</label>
                        <select name="book_id" class="form-select bg-dark border-secondary text-light p-3 shadow-sm" required>
                            <option value="" disabled selected>-- Pilih Buku yang Ingin Dipinjam --</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}" {{ $book->stock <= 0 ? 'disabled' : '' }}>
                                    {{ $book->title }} (Stok: {{ $book->stock }})
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text text-secondary mt-2">Pastikan stok tersedia sebelum meminjam.</div>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('transactions.index') }}" class="btn btn-outline-secondary px-4 rounded-pill fw-medium">Batal</a>
                        <button type="submit" class="btn btn-primary px-5 rounded-pill fw-bold">Konfirmasi Pinjam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection