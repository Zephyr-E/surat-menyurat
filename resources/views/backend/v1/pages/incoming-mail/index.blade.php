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
        @if (Auth::user()->role !== 'User')
        <a href="{{ route('incoming-mail.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Surat Masuk
        </a>
        @endif
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered datatables">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    @if (Auth::user()->role !== 'User')
                    <th scope="col">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cog"></i>
                        </div>
                    </th>
                    @endif
                    <th scope="col">Author</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">TTE Penanggung Jwb</th>
                    <th scope="col">Disposisi</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incoming_mails as $incoming_mail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if (Auth::user()->role !== 'User')
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('incoming-mail.edit', $incoming_mail->id) }}"
                                class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('incoming-mail.destroy', $incoming_mail->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Surat Masuk?')">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $incoming_mail->user->name }}</td>
                    <td>{{ $incoming_mail->number }}</td>
                    <td>{{ $incoming_mail->regarding }}</td>
                    <td>{{ date('d-m-Y', strtotime($incoming_mail->date)) }}</td>
                    <td>{{ $incoming_mail->agency }}</td>
                    <td>
                        <img class="p-3"
                            src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('incoming-mail.show', $incoming_mail->uuid), 'QRCODE', 2, 2) }}"
                            alt="barcode">
                    </td>
                    <td>{{ $incoming_mail->employee->name .'|'. $incoming_mail->employee->position }}</td>
                    <td>
                        <a href="{{ url('storage') . '/' . $incoming_mail->file }}" target="_blank">
                            <i class="fas fa-download"></i>
                            Unduh
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection