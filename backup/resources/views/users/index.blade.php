@extends('layout.app')

@section('content')
<div class="mb-4">
    <h4 class="text-light fw-bold">Manajemen Pengguna</h4>
    <p class="text-secondary small">Kelola hak akses dan roles untuk setiap pengguna terdaftar.</p>
</div>

@if(session('error'))
    <div class="alert alert-danger border-0 shadow-sm small mb-4">{{ session('error') }}</div>
@endif

<div class="card border-0 shadow-lg rounded-4 overflow-hidden">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0 align-middle">
                <thead class="bg-secondary bg-opacity-25 border-bottom border-dark">
                    <tr>
                        <th class="py-3 px-4">Nama User</th>
                        <th class="py-3 px-4">Alamat Email</th>
                        <th class="py-3 px-4">Role Akses</th>
                        <th class="py-3 px-4 text-center">Tindakan</th>
                    </tr>
                </thead>
                <tbody class="border-secondary border-opacity-10">
                    @foreach($users as $user)
                    <tr>
                        <td class="px-4 fw-medium text-light">{{ $user->name }}</td>
                        <td class="px-4 text-secondary">{{ $user->email }}</td>
                        <td class="px-4">
                            <form action="{{ route('users.update', $user->id) }}" method="POST" class="d-flex align-items-center">
                                @csrf @method('PUT')
                                <select name="role" class="form-select form-select-sm bg-dark border-secondary text-light me-2 rounded-pill px-3" style="width: auto;">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                </select>
                                <button class="btn btn-sm btn-primary rounded-pill px-3">Update</button>
                            </form>
                        </td>
                        <td class="px-4 text-center">
                            @if(Auth::id() != $user->id)
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-link text-danger p-0" onclick="return confirm('Hapus user ini?')">
                                    <i class="bi bi-trash fs-5"></i>
                                </button>
                            </form>
                            @else
                                <span class="badge bg-secondary opacity-50">Current User</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection