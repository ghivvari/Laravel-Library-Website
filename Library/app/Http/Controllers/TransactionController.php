<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    // Menampilkan daftar transaksi
    public function index() {
        if (Auth::user()->role == 'admin') {
            $transactions = Transaction::with(['user', 'book'])->get();
        } else {
            $transactions = Transaction::with(['book'])->where('user_id', Auth::id())->get();
        }
        return view('transactions.index', compact('transactions'));
    }

    // Menampilkan form pinjam (Hanya Member)
    public function create() {
        $books = Book::where('stock', '>', 0)->get();
        return view('transactions.create', compact('books'));
    }

    // Menyimpan data peminjaman
    public function store(Request $request) {
        $book = Book::find($request->book_id);
        
        // Kurangi stok buku
        $book->decrement('stock');

        Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $request->book_id,
            'borrow_date' => now(),
            'status' => 'borrowed',
        ]);

        return redirect()->route('transactions.index')->with('success', 'Buku berhasil dipinjam!');
    }

    public function update(Request $request, Transaction $transaction)
    {
        // Ubah status transaksi jadi returned
        $transaction->update([
            'return_date' => now(),
            'status' => 'returned'
        ]);

        // Tambahkan kembali stok buku
        $book = Book::find($transaction->book_id);
        $book->increment('stock');

        return redirect()->route('transactions.index')->with('success', 'Buku telah dikembalikan.');
    }
}