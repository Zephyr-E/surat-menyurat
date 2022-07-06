@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Data Arsip</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        @if (Auth::user()->role !== 'User')
        <a href="{{ route('archive.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Arsip
        </a>
        @endif
    </div>
    <div class="card-body table-responsive">
        <table class="table table-bordered datatables">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    @if (Auth::user()->role !== 'User')
                    <th scope="col" class="col-2">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cog"></i>
                        </div>
                    </th>
                    @endif
                    <th scope="col">Author</th>
                    <th scope="col">Nama File</th>
                    <th scope="col">Tgl ditambahkan</th>
                    <th scope="col">Tgl diperbaharui</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($archives as $archive)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if (Auth::user()->role !== 'User')
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('archive.edit', $archive->id) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('archive.destroy', $archive->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Arsip?')">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $archive->user->name }}</td>
                    <td>{{ $archive->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($archive->created_at)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($archive->updated_at)) }}</td>
                    <td>
                        <a href="{{ url('storage') . '/' . $archive->file }}" target="_blank">
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