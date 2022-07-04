@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Profil</h2>
@endsection

@section('button')
<form action="{{ route('user.destroy', $user->id) }}" method="POST">
    @csrf
    @method('delete')
    <button class="btn btn-sm btn-danger text-white" onclick="return confirm('Yakin Ingin Hapus Pengguna?')">
        <i class="fas fa-trash"></i>
        Hapus Akun
    </button>
</form>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('user.update', $user) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}"
                    placeholder="Masukkan Nama Lengkap" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ $user->username }}"
                    placeholder="Masukkan Username" required>
            </div>
            @if (Auth::user()->role !== 'User')
            <div class="form-group">
                <label for="role">Status</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="role" value="Admin" {{ $user->role
                        == 'Admin' ? 'checked' : '' }}>
                        <label class="form-check-label" for="role">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="role" value="User" {{ $user->role
                        == 'User' ? 'checked' : '' }}>
                        <label class="form-check-label" for="role">
                            User
                        </label>
                    </div>
                </div>
            </div>
            @endif
            <div class="form-group pt-3">
                <button class="btn btn-primary">Perbaharui</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection