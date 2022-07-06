@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Pengguna</h2>
@endsection

@section('content')
<div class="card">
    <div class="card-title">
        @if (Auth::user()->role !== 'User')
        <a href="{{ route('user.create') }}" class="btn btn-secondary btn-add text-white">
            <i class="fas fa-plus fa-sm"></i> Tambah Pengguna
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
                    <th scope="col">Nama</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Tanggal di Buat</th>
                </tr>
            </thead>
            <tbody>
                @php $number = 1 @endphp
                @foreach ($users as $user)
                @continue(Auth::user()->id == $user->id)
                <tr>
                    <td>{{ $number++ }}</td>
                    @if (Auth::user()->role !== 'User')
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-light btn-sm text-danger"
                                    onclick="return confirm('Yakin Ingin Hapus Pengguna?')">
                                    <i class="fas fa-trash text-danger"></i>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                    @endif
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection