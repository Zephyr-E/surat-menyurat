@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Telaah Staff</h2>
@endsection

@section('button')
<a href="{{ route('report.employee-review') }}" class="btn btn-sm btn-info" target="_blank">
    <i class="fas fa-download"></i> Cetak Laporan Telaah Staff
</a>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        @if (Auth::user()->role !== 'User')
        <a href="{{ route('employee-review.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Telaah Staff
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
                @foreach ($employee_reviews as $employee_review)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if (Auth::user()->role !== 'User')
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('employee-review.edit', $employee_review->id) }}"
                                class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('employee-review.destroy', $employee_review->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Telaah Staff?')">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $employee_review->user->name }}</td>
                    <td>{{ $employee_review->number }}</td>
                    <td>
                        <div class="ellipsis-text">
                            {{ $employee_review->regarding }}
                        </div>
                        <span class="text-primary ellipsis-expand">selengkapnya</span>
                    </td>
                    <td>{{ date('d-m-Y', strtotime($employee_review->date)) }}</td>
                    <td>
                        <img class="p-3"
                            src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('employee-review.show', $employee_review->uuid), 'QRCODE', 2, 2) }}"
                            alt="barcode">
                    </td>
                    <td>{{ $employee_review->disposition }}</td>
                    <td>
                        <a href="{{ url('storage') . '/' . $employee_review->file }}" target="_blank">
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