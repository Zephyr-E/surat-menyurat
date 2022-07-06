@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Pegawai</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        <a href="{{ route('employee.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Pegawai
        </a>
    </div>
    <div class="card-body table-responsive">
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
                    <th scope="col">NIP</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jabatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if (Auth::user()->role !== 'User')
                        <div class="btn-group">
                            <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('employee.destroy', $employee->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Pegawai?')">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                        @endif
                    </td>
                    <td>{{ $employee->nip }}</td>
                    <td>{{ $employee->nik }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->position }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection