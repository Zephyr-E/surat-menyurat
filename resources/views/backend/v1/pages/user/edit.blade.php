@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Ubah Pengguna</h2>
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
            @if (Auth::user()->rule !== 'User')
            <div class="form-group">
                <label for="rule">Status</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rule" id="rule" value="Admin" {{ $user->rule
                        == 'Admin' ? 'checked' : '' }}>
                        <label class="form-check-label" for="rule">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rule" id="rule" value="User" {{ $user->rule
                        == 'User' ? 'checked' : '' }}>
                        <label class="form-check-label" for="rule">
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