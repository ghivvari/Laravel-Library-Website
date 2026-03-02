@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-primary py-3 text-white">
                <h5 class="mb-0 fw-bold"><i class="bi bi-plus-circle me-2"></i> Tambah Koleksi Buku</h5>
            </div>
            <div class="card-body p-4 p-lg-5">
                <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">JUDUL BUKU</label>
                        <input type="text" name="title" class="form-control bg-dark border-secondary text-light p-3" placeholder="Masukkan judul buku" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">PENULIS / PENGARANG</label>
                        <input type="text" name="author" class="form-control bg-dark border-secondary text-light p-3" placeholder="Nama lengkap penulis" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">KATEGORI</label>
                        <input type="text" name="category" class="form-control bg-dark border-secondary text-light p-3" placeholder="Contoh: Novel, Sains, Sejarah" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">COVER BUKU</label>
                        <input type="file" name="image" class="form-control bg-dark border-secondary text-light p-3">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">JUMLAH STOK</label>
                        <input type="number" name="stock" class="form-control bg-dark border-secondary text-light p-3" placeholder="Contoh: 10" required>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary px-4 rounded-pill fw-medium">Batal</a>
                        <button type="submit" class="btn btn-primary px-5 rounded-pill fw-bold">Simpan Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection