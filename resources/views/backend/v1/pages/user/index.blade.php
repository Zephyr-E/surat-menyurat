@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Pengguna</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        <a href="{{ route('user.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Pengguna
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
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tanggal di Buat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if (Auth::user()->rule !== 'User')
                        <div class="row justify-content-center">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
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
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->rule }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection