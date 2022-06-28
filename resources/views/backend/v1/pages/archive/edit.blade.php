@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Ubah Arsip</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('archive.update', $archive) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Nama File</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama File"
                    value="{{ $archive->name }}" required>
            </div>
            <div class="form-group">
                <label for="file">Upload File</label>
                <input type="hidden" name="oldFile" value="{{ $archive->file }}">
                <br><span>Pilih File Baru :</span>
                <input class="form-control" type="file" id="file" name="file" required>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Perbaharui</button>
                <a href="{{ route('archive.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection