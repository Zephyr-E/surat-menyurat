@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Tambah Surat Keluar</h2>
@endsection

@section('content')
<div class="card mt-5">
    <div class="card-body">
        <form action="{{ route('outgoing-mail.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="number">No Surat</label>
                <input type="text" class="form-control" readonly name="number" id="number"
                    placeholder="Masukkan No Surat" value="{{ $outgoingMail ? $outgoingMail->number+1 : '1' }}">
            </div>
            <div class="form-group">
                <label for="code">Kode</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Masukkan Kode">
            </div>
            <div class="form-group">
                <label for="regarding">Perihal</label>
                <textarea class="form-control" name="regarding" id="regarding" cols="30" rows="2"
                    placeholder="Isi Perihal"></textarea>
            </div>
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" name="date" id="date">
            </div>
            <div class="form-group">
                <label for="agency">Instansi</label>
                <input type="text" class="form-control" name="agency" id="agency" placeholder="Masukkan Instansi">
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('outgoing-mail.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection