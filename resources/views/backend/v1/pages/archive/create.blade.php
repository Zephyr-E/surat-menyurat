@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Tambah Arsip</h2>
@endsection

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <form action="{{ route('archive.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nama File</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama File">
            </div>
            <div class="form-group">
                <label for="file">Upload File</label>
                <br><span>Pilih File Baru :</span>
                <input class="form-control" type="file" id="file" name="file">
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('archive.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection