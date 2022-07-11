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