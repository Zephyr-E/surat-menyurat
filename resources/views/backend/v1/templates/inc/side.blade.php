<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{ url('templates/backend') }}/img/profile3.png" alt="..."
                        class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ Str::limit(Auth::user()->name, 16) }}
                            <span class="user-level">{{ Auth::user()->role }}</span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ route('profile') }}">
                                    <span class="link-collapse">Pengaturan Akun</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ in_array(Route::currentRouteName(), ['incoming-mail.index', 'incoming-mail.create', 'incoming-mail.edit']) ? 'active' : '' }}">
                    <a href="{{ route('incoming-mail.index') }}">
                        <i class="fas fa-inbox"></i>
                        <p>Surat Masuk</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ in_array(Route::currentRouteName(), ['outgoing-mail.index', 'outgoing-mail.create', 'outgoing-mail.edit']) ? 'active' : '' }}">
                    <a href="{{ route('outgoing-mail.index') }}">
                        <i class="fas fa-inbox"></i>
                        <p>Surat Keluar</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ in_array(Route::currentRouteName(), ['archive.index', 'archive.create', 'archive.edit']) ? 'active' : '' }}">
                    <a href="{{ route('archive.index') }}">
                        <i class="fas fa-file-archive"></i>
                        <p>Arsip</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ in_array(Route::currentRouteName(), ['employee.index', 'employee.create', 'employee.edit']) ? 'active' : '' }}">
                    <a href="{{ route('employee.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
                <li
                    class="nav-item {{ in_array(Route::currentRouteName(), ['user.index', 'user.create', 'user.edit']) ? 'active' : '' }}">
                    <a href="{{ route('user.index') }}">
                        <i class="fas fa-users"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->