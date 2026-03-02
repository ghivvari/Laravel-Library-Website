<?php

namespace App\Http\Controllers;

use App\Models\User; // <-- CEK INI
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Tambahkan ini jika menggunakan auth()

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $user->update([
            'role' => $request->role
        ]);
        return redirect()->route('users.index')->with('success', 'Role berhasil diubah');
    }

    public function destroy(User $user)
    {
        // Mencegah menghapus diri sendiri
        if ($user->id === Auth::id()) {
            return redirect()->route('users.index')->with('error', 'Tidak bisa hapus akun sendiri');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}