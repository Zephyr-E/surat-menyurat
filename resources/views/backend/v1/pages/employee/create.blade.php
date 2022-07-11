@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Tambah Pegawai</h2>
@include('backend.v1.templates.inc.create-navigation')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('employee.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" class="form-control" name="nip" id="nip" placeholder="Masukkan NIP" required>
            </div>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK" required>
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap"
                    required>
            </div>
            <div class="form-group">
                <label for="position">Jabatan</label>
                <input type="text" class="form-control" name="position" id="position" placeholder="Masukkan Jabatan"
                    required>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('employee.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection