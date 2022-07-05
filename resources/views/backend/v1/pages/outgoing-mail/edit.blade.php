@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Ubah Surat Keluar</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('outgoing-mail.update', $outgoing_mail) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="number">No Surat</label>
                <input type="text" class="form-control" readonly name="number" id="number"
                    placeholder="Masukkan No Surat" value="{{ $outgoing_mail->number }}" required>
            </div>
            <div class="form-group">
                <label for="code">Kode</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="Masukkan Kode"
                    value="{{ $outgoing_mail->code }}" required>
            </div>
            <div class="form-group">
                <label for="regarding">Perihal</label>
                <textarea class="form-control" name="regarding" id="regarding" cols="30" rows="2"
                    placeholder="Isi Perihal" required>{{ $outgoing_mail->regarding }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ $outgoing_mail->date }}"
                    required>
            </div>
            <div class="form-group">
                <label for="agency">Instansi</label>
                <input type="text" class="form-control" name="agency" id="agency" placeholder="Masukkan Instansi"
                    value="{{ $outgoing_mail->agency }}" required>
            </div>
            <div class="form-group">
                <label for="employee_id">TTE Pegawai</label>
                <select class="form-control selectpicker" id="employee_id" name="employee_id" data-live-search="true"
                    required>
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ ($employee->id == $outgoing_mail->employee->id) ? 'selected'
                        : '' }}>{{ $employee->nip.' | '.$employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="file">Upload File <small class="text-danger">(format .pdf maks. 10MB)</small></label>
                <input type="hidden" name="oldFile" value="{{ $outgoing_mail->file }}">
                <br><span>Pilih File Baru :</span>
                <input class="form-control" type="file" id="file" name="file" accept=".pdf">
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Perbaharui</button>
                <a href="{{ route('outgoing-mail.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection