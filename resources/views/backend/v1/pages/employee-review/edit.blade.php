@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Ubah Telaah Staff</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('employee-review.update', $employee_review) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="number">No Surat</label>
                <input type="text" class="form-control" readonly name="number" id="number"
                    placeholder="Masukkan No Surat" value="{{ $employee_review->number }}" required>
            </div>
            <div class="form-group">
                <label for="regarding">Perihal</label>
                <textarea class="form-control" name="regarding" id="regarding" cols="30" rows="2"
                    placeholder="Isi Perihal" required>{{ $employee_review->regarding }}</textarea>
            </div>
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ $employee_review->date }}" required>
            </div>
            <div class="form-group">
                <label for="employee_id">TTE Pegawai</label>
                <select class="form-control selectpicker" id="employee_id" name="employee_id" data-live-search="true"
                    required>
                    <option value="">-- Pilih Pegawai --</option>
                    @foreach ($employees as $employee)
                    <option value="{{ $employee->id }}" {{ ($employee->id == $employee_review->employee->id) ? 'selected'
                        : '' }}>{{ $employee->nip.' | '.$employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="disposition">Disposisi</label>
                <input type="text" class="form-control" name="disposition" id="disposition"
                    placeholder="Masukkan Disposisi Surat" value="{{ $employee_review->disposition }}" required>
            </div>
            <div class="form-group">
                <label for="file">Upload File <small class="text-danger">(format .pdf maks. 10MB)</small></label>
                <input type="hidden" name="oldFile" value="{{ $employee_review->file }}">
                <br><span>Pilih File Baru :</span>
                <input class="form-control" type="file" id="file" name="file" accept=".pdf">
            </div>
            <div class="form-group pt-3">
                <button class="btn btn-primary">Perbaharui</button>
                <a href="{{ route('employee-review.index') }}" class="btn btn-warning">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection