@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="card-header bg-warning py-3 text-dark">
                <h5 class="mb-0 fw-bold"><i class="bi bi-pencil-square me-2"></i> Edit Data Buku</h5>
            </div>
            <div class="card-body p-4 p-lg-5">
                <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">JUDUL BUKU</label>
                        <input type="text" name="title" class="form-control bg-dark border-secondary text-light p-3" value="{{ $book->title }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">PENULIS / PENGARANG</label>
                        <input type="text" name="author" class="form-control bg-dark border-secondary text-light p-3" value="{{ $book->author }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">KATEGORI</label>
                        <input type="text" name="category" class="form-control bg-dark border-secondary text-light p-3" value="{{ $book->category }}" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">COVER BUKU (BIARKAN KOSONG JIKA TIDAK INGIN DIUBAH)</label>
                        @if($book->image)
                            <div class="mb-2 bg-dark rounded p-2 text-center" style="height: 150px;">
                                <img src="{{ asset('storage/'.$book->image) }}" class="h-100 object-fit-contain" alt="Preview">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control bg-dark border-secondary text-light p-3">
                    </div>
                    <div class="mb-4">
                        <label class="form-label small fw-semibold text-secondary">JUMLAH STOK</label>
                        <input type="number" name="stock" class="form-control bg-dark border-secondary text-light p-3" value="{{ $book->stock }}" required>
                    </div>
                    <div class="d-flex gap-2 text-center">
                        <a href="{{ route('books.index') }}" class="btn btn-outline-secondary px-4 rounded-pill fw-medium">Kembali</a>
                        <button type="submit" class="btn btn-warning px-5 rounded-pill fw-bold">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection