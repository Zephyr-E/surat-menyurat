{{-- @dd($incoming_mails) --}}
@extends('backend.v1.templates.index')

@section('title')
<h2 class="text-white pb-2 fw-bold">Surat Masuk</h2>
@endsection

@section('button')
<a href="{{ route('incoming-mail.create') }}" class="btn btn-secondary btn-round">Tambah Surat Masuk</a>
@endsection

@section('content')

<div class="card mt-5">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    @if (Auth::user()->rule !== 'User')
                    <th scope="col">
                        <div class="d-flex justify-content-center">
                            <i class="fas fa-cog"></i>
                        </div>
                    </th>
                    @endif
                    <th scope="col">No Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Instansi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($incoming_mails as $incoming_mail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    @if (Auth::user()->rule !== 'User')
                    <td>
                        <div class="row justify-content-center">
                            <a href="{{ route('incoming-mail.edit', $incoming_mail->id) }}"
                                class="btn btn-light btn-sm">
                                <i class="fas fa-pen text-primary"></i>
                                Edit
                            </a>
                            <form action="{{ route('incoming-mail.destroy', $incoming_mail->id) }}" method="POST">
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
                    <td>{{ $incoming_mail->number }}</td>
                    <td>{{ Str::limit($incoming_mail->regarding, 70) }}</td>
                    <td>{{ $incoming_mail->date }}</td>
                    <td>{{ $incoming_mail->agency }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">
                        <h2>Surat Masuk Kosong</h2>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection