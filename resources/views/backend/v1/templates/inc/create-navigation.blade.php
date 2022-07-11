<div class="form-group">
    <div class="btn-group">
        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            Navigasi Menu Tambah
        </button>
        <div class="dropdown-menu">
            <a class="dropdown-item {{ (Route::currentRouteName() == 'incoming-mail.create') ? 'active' : '' }}"
                href="{{ route('nav-create', 'incoming-mail') }}">Tambah Surat
                Masuk</a>
            <a class="dropdown-item {{ (Route::currentRouteName() == 'outgoing-mail.create') ? 'active' : '' }}"
                href="{{ route('nav-create', 'outgoing-mail') }}">Tambah Surat Keluar</a>
            <a class="dropdown-item {{ (Route::currentRouteName() == 'decree.create') ? 'active' : '' }}"
                href="{{ route('nav-create', 'decree') }}">Tambah Surat Keputusan</a>
            <a class="dropdown-item {{ (Route::currentRouteName() == 'employee-review.create') ? 'active' : '' }}"
                href="{{ route('nav-create', 'employee-review') }}">Tambah Telaah Staff</a>
            <a class="dropdown-item {{ (Route::currentRouteName() == 'archive.create') ? 'active' : '' }}"
                href="{{ route('nav-create', 'archive') }}">Tambah Arsip</a>
            <a class="dropdown-item {{ (Route::currentRouteName() == 'employee.create') ? 'active' : '' }}"
                href="{{ route('nav-create', 'employee') }}">Tambah Pegawai</a>
            <a class="dropdown-item {{ (Route::currentRouteName() == 'user.create') ? 'active' : '' }}"
                href="{{ route('nav-create', 'user') }}">Tambah Pengguna</a>
        </div>
    </div>
</div>