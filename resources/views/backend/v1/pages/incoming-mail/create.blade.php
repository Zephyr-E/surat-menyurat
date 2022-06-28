@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Tambah Surat Masuk</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('incoming-mail.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">No Surat</label>
                <input type="text" class="form-control" name="number" id="number" placeholder="Masukkan No Surat"
                    required>
            </div>
            <div class="form-group">
                <label for="regarding">Perihal</label>
                <textarea class="form-control" name="regarding" id="regarding" cols="30" rows="2"
                    placeholder="Isi Perihal" required></textarea>
            </div>
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" name="date" id="date" required>
            </div>
            <div class="form-group">
                <label for="agency">Instansi</label>
                <input type="text" class="form-control" name="agency" id="agency" placeholder="Masukkan Instansi" required>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('incoming-mail.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection