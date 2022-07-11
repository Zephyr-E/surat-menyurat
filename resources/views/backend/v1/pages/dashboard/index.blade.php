@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Beranda</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row mt-5">
            <a href="{{ route('incoming-mail.index') }}" class="btn col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-inbox fa-fw"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Surat Masuk</p>
                                    <h4 class="card-title">{{ $incoming_mail }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('outgoing-mail.index') }}" class="btn col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-inbox fa-fw"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Surat Keluar</p>
                                    <h4 class="card-title">{{ $outgoing_mail }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('decree.index') }}" class="btn col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-inbox fa-fw"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Surat Keputusan</p>
                                    <h4 class="card-title">{{ $decree }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('employee-review.index') }}" class="btn col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-inbox fa-fw"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Telaah Staff</p>
                                    <h4 class="card-title">{{ $employee_review }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('archive.index') }}" class="btn col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-file-archive fa-fw"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Arsip</p>
                                    <h4 class="card-title">{{ $archive }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('employee.index') }}" class="btn col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-users fa-fw"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Pegawai</p>
                                    <h4 class="card-title">{{ $employee }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('user.index') }}" class="btn col-sm-6 col-md-3">
                <div class="card card-stats card-warning card-round">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-users fa-fw"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Pengguna</p>
                                    <h4 class="card-title">{{ $user }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection