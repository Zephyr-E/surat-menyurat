<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-KATAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('backend.v1.templates.inc.head')
</head>

<body>
    <h1 class="text-center">Laporan Surat Masuk</h1>
    <h1 class="text-center">Nama Lembaga</h1>
    <div class="wrapper mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
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
                    <td>{{ $incoming_mail->number }}</td>
                    <td>{{ $incoming_mail->regarding }}</td>
                    <td>{{ $incoming_mail->date }}</td>
                    <td>{{ $incoming_mail->agency }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Surat Masuk Kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('backend.v1.templates.inc.script')
    <script>
        window.print()
    </script>
</body>

</html>