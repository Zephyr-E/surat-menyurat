@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Tambah Surat Masuk</h2>
<div class="form-group">
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Tambah Surat Masuk
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item active" href="#">Tambah Surat Masuk</a>
            <a class="dropdown-item" href="{{ route('outgoing-mail.create') }}">Tambah Surat Keluar</a>
            <a class="dropdown-item" href="{{ route('archive.create') }}">Tambah Arsip</a>
            <a class="dropdown-item" href="{{ route('employee.create') }}">Tambah Pegawai</a>
            <a class="dropdown-item" href="{{ route('user.create') }}">Tambah Pengguna</a>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('incoming-mail.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" class="form-control" name="agency" id="agency" placeholder="Masukkan Instansi"
                    required>
            </div>
            <div class="form-group">
                <label for="employee_id">TTE Penanggung Jawab</label>
                <select class="form-control selectpicker" id="employee_id" name="employee_id" data-live-search="true"
                    required>
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->nip.' | '.$employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="disposition">Disposisi</label>
                <input type="text" class="form-control" name="disposition" id="disposition"
                    placeholder="Masukkan Disposisi Surat" required>
            </div>
            <div class="form-group">
                <label for="file">Upload File <small class="text-danger">(format .pdf maks. 10MB)</small></label>
                <br><span>Pilih File Baru :</span>
                <input class="form-control" type="file" id="file" name="file" accept=".pdf" required>
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('incoming-mail.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection