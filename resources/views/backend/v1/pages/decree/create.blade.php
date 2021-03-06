@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Tambah Surat Masuk</h2>
@include('backend.v1.templates.inc.create-navigation')
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('decree.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="number">No Surat</label>
                <input type="text" class="form-control" readonly name="number" id="number"
                    placeholder="Masukkan No Surat" value="{{ $decree ? $decree->number+1 : '1' }}" required>
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
                <a href="{{ route('decree.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection