@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 text-light fw-bold">Daftar Koleksi Buku</h4>
    @if(Auth::user()->role == 'admin')
        <a href="{{ route('books.create') }}" class="btn btn-primary shadow-sm"><i class="bi bi-plus-lg me-1"></i> Tambah Buku</a>
    @endif
</div>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
    @foreach($books as $book)
    <div class="col">
        <div class="card h-100 shadow-sm border-0 d-flex flex-column transition-hover">
            <!-- Image Display -->
            <div class="bg-dark bg-opacity-50 text-center" style="height: 250px;">
                @if($book->image)
                    <img src="{{ asset('storage/'.$book->image) }}" class="img-fluid h-100 object-fit-contain" alt="{{ $book->title }}">
                @else
                    <img src="https://via.placeholder.com/300x400/2a2a2a/ffffff?text=No+Cover" class="img-fluid h-100 object-fit-contain" alt="No Cover">
                @endif
            </div>
            
            <div class="card-body d-flex flex-column">
                <h6 class="card-title text-light fw-bold mb-1 line-clamp-2">{{ $book->title }}</h6>
                <p class="card-text text-secondary small mb-1">{{ $book->author }}</p>
                <div class="mb-3">
                    <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 small rounded-pill px-2">{{ $book->category ?? 'General' }}</span>
                </div>
                <div class="mt-auto d-flex justify-content-between align-items-center">
                    <span class="badge bg-dark border border-secondary text-light">Stok: {{ $book->stock }}</span>
                </div>
            </div>
            
            @if(Auth::user()->role == 'admin')
            <div class="card-footer bg-transparent border-top border-dark pb-3 pt-3 d-flex gap-2">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-outline-light btn-sm flex-fill">Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline flex-fill">
                    @csrf @method('DELETE')
                    <button class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>

<style>
    .transition-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
    .transition-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.3) !important; }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
</style>
@endsection