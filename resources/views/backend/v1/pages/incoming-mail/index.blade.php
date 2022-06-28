@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Surat Masuk</h2>
@endsection

@section('button')
<a href="{{ route('report.incoming-mail') }}" class="btn btn-sm btn-info" target="_blank">
    <i class="fas fa-download"></i> Cetak Laporan Surat Masuk
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        <a href="{{ route('incoming-mail.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Surat Masuk
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered datatables">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">
                        @if (Auth::user()->rule !== 'User')
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cog"></i>
                        </div>
                        @endif
                    </th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Instansi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incoming_mails as $incoming_mail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if (Auth::user()->rule !== 'User')
                        <div class="row justify-content-center">
                            <a href="{{ route('incoming-mail.edit', $incoming_mail->id) }}"
                                class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('incoming-mail.destroy', $incoming_mail->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                        @endif
                    </td>
                    <td>{{ $incoming_mail->number }}</td>
                    <td>{{ $incoming_mail->regarding }}</td>
                    <td>{{ $incoming_mail->date }}</td>
                    <td>{{ $incoming_mail->agency }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection