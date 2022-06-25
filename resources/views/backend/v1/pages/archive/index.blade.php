@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Arsip</h2>
@endsection

@section('button')
<a href="{{ route('archive.create') }}" class="btn btn-secondary btn-round">Tambah Arsip</a>
@endsection

@section('content')

<div class="card mt-5">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    @if (Auth::user()->rule !== 'User')
                    <th scope="col" class="col-2">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cog"></i>
                        </div>
                    </th>
                    @endif
                    <th scope="col">Nama File</th>
                    <th scope="col">File</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($archives as $archive)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if (Auth::user()->rule !== 'User')
                    <td>
                        <div class="row justify-content-center">
                            <a href="{{ route('archive.edit', $archive->id) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('archive.destroy', $archive->id) }}" method="POST">
                                @csrf
                                @method("delete")
                                <button class="btn btn-light btn-sm text-danger">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $archive->name }}</td>
                    <td>
                        <a href="{{ url('storage') . '/' . $archive->file }}" target="_blank">
                            <i class="fas fa-download"></i>
                            Unduh
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        <h2>Arsip Kosong</h2>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection