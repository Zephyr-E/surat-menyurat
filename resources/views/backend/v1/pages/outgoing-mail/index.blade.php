@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Surat Keluar</h2>
@endsection

@section('button')
<a href="{{ route('report.outgoing-mail') }}" class="btn btn-sm btn-info" target="_blank">
    <i class="fas fa-download"></i> Cetak Laporan Surat Keluar
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        <a href="{{ route('outgoing-mail.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Surat Keluar
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered datatables">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">
                        @if (Auth::user()->role !== 'User')
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cog"></i>
                        </div>
                        @endif
                    </th>
                    <th scope="col">Author</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">TTE</th>
                    <th scope="col">Pegawai</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($outgoing_mails as $outgoing_mail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if (Auth::user()->role !== 'User')
                        <div class="row justify-content-center">
                            <a href="{{ route('outgoing-mail.edit', $outgoing_mail->id) }}"
                                class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('outgoing-mail.destroy', $outgoing_mail->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Surat Keluar?')">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                        @endif
                    </td>
                    <td>{{ $outgoing_mail->user->name }}</td>
                    <td>{{ $outgoing_mail->number }}</td>
                    <td>{{ $outgoing_mail->code }}</td>
                    <td>{{ $outgoing_mail->regarding }}</td>
                    <td>{{ date('d-m-Y', strtotime($outgoing_mail->date)) }}</td>
                    <td>{{ $outgoing_mail->agency }}</td>
                    <td>
                        <img class="p-3"
                            src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('employee.show', $outgoing_mail->employee->id), 'QRCODE', 2, 2) }}"
                            alt="barcode">
                    </td>
                    <td>{{ $outgoing_mail->employee->nip .'|'. $outgoing_mail->employee->name }}</td>
                    <td>
                        <a href="{{ url('storage') . '/' . $outgoing_mail->file }}" target="_blank">
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