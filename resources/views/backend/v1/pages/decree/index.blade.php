@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Surat Keputusan</h2>
@endsection

@section('button')
<a href="{{ route('report.decree') }}" class="btn btn-sm btn-info" target="_blank">
    <i class="fas fa-download"></i> Cetak Laporan Surat Keputusan
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        @if (Auth::user()->role !== 'User')
        <a href="{{ route('decree.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Surat Keputusan
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
                    <th scope="col">TTE Penanggung Jwb</th>
                    <th scope="col">Disposisi</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($decrees as $decree)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if (Auth::user()->role !== 'User')
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('decree.edit', $decree->id) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('decree.destroy', $decree->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Surat Keputusan?')">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $decree->user->name }}</td>
                    <td>{{ $decree->number }}</td>
                    <td>
                        <div class="ellipsis-text">
                            {{ $decree->regarding }}
                        </div>
                        <span class="text-primary ellipsis-expand">selengkapnya</span>
                    </td>
                    <td>{{ date('d-m-Y', strtotime($decree->date)) }}</td>
                    <td>
                        <img class="p-3"
                            src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('decree.show', $decree->uuid), 'QRCODE', 2, 2) }}"
                            alt="barcode">
                    </td>
                    <td>
                        <div class="ellipsis-text">
                            {{ $decree->disposition }}
                        </div>
                        <span class="text-primary ellipsis-expand">selengkapnya</span>
                    </td>
                    <td>
                        <a href="{{ url('storage') . '/' . $decree->file }}" target="_blank">
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