@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 text-light fw-bold">Riwayat Peminjaman</h4>
    @if(Auth::user()->role == 'member')
        <a href="{{ route('transactions.create') }}" class="btn btn-primary rounded-pill shadow-sm"><i class="bi bi-plus-lg me-1"></i> Pinjam Buku Baru</a>
    @endif
</div>

<div class="card border-0 shadow-lg rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead class="bg-primary bg-opacity-25 border-bottom border-dark">
                    <tr>
                        @if(Auth::user()->role == 'admin') <th class="py-3 px-4">Peminjam</th> @endif
                        <th class="py-3 px-4">Judul Buku</th>
                        <th class="py-3 px-4">Tanggal Pinjam</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody class="border-secondary border-opacity-10">
                    @forelse($transactions as $t)
                    <tr>
                        @if(Auth::user()->role == 'admin') <td class="px-4 fw-medium text-info">{{ $t->user->name }}</td> @endif
                        <td class="px-4 text-light">{{ $t->book->title }}</td>
                        <td class="px-4 text-secondary">{{ $t->borrow_date }}</td>
                        <td class="px-4">
                            <span class="badge rounded-pill bg-{{ $t->status == 'borrowed' ? 'warning text-dark' : 'success' }} px-3 py-2">
                                {{ $t->status == 'borrowed' ? 'Dipinjam' : 'Dikembalikan' }}
                            </span>
                        </td>
                        <td class="px-4">
                            @if($t->status == 'borrowed' && Auth::id() == $t->user_id)
                                <form action="{{ route('transactions.update', $t->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-outline-success rounded-pill px-3" onclick="return confirm('Apakah Anda ingin mengembalikan buku ini?')">
                                        <i class="bi bi-arrow-return-left me-1"></i> Kembalikan
                                    </button>
                                </form>
                            @else
                                <span class="text-secondary small opacity-50">-</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-5 text-center text-secondary">Belum ada riwayat transaksi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection