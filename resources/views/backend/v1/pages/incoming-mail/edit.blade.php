@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Ubah Surat Masuk</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('incoming-mail.update', $incoming_mail) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="number">No Surat</label>
                <input type="text" class="form-control" name="number" id="number" placeholder="Masukkan No Surat"
                    value="{{ $incoming_mail->number }}" required>
            </div>
            <div class="form-group">
                <label for="regarding">Perihal</label>
                <textarea class="form-control" name="regarding" id="regarding" cols="30" rows="2"
                    placeholder="Isi Perihal" required>{{ $incoming_mail->regarding }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ $incoming_mail->date }}"
                    required>
            </div>
            <div class="form-group">
                <label for="agency">Instansi</label>
                <input type="text" class="form-control" name="agency" id="agency" placeholder="Masukkan Instansi"
                    value="{{ $incoming_mail->agency }}" required>
            </div>
            <div class="form-group">
                <label for="employee_id">Pegawai</label>
                <select class="form-control selectpicker" id="employee_id" name="employee_id" data-live-search="true"
                    required>
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ ($employee->id == $incoming_mail->employee->id) ? 'selected'
                        : '' }}>{{ $employee->nip.' | '.$employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="file">Upload File</label>
                <input type="hidden" name="oldFile" value="{{ $incoming_mail->file }}">
                <br><span>Pilih File Baru :</span>
                <input class="form-control" type="file" id="file" name="file">
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Perbaharui</button>
                <a href="{{ route('incoming-mail.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection