@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Tambah Pengguna</h2>
@include('backend.v1.templates.inc.create-navigation')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap"
                    required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username"
                    required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password"
                    placeholder="Masukkan Password" required>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="role" value="Admin" checked>
                        <label class="form-check-label" for="role">
                            Admin
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="role" value="User">
                        <label class="form-check-label" for="role">
                            User
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection