<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-KETAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('backend.v1.templates.inc.head')
</head>

<body>
    <h1 class="text-center">Laporan Surat Keluar</h1>
    <h1 class="text-center">Dinas Ketahanan Pangan</h1>
    <div class="wrapper mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Kode</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Instansi</th>
                    <th scope="col">TTE</th>
                    <th scope="col">Penandatangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($outgoing_mails as $outgoing_mail)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $outgoing_mail->number }}</td>
                    <td>{{ $outgoing_mail->code }}</td>
                    <td>{{ $outgoing_mail->regarding }}</td>
                    <td>{{ date('d-m-Y', strtotime($outgoing_mail->date)) }}</td>
                    <td>{{ $outgoing_mail->agency }}</td>
                    <td>
                        <img class="p-3"
                            src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('outgoing-mail.show', $outgoing_mail->uuid), 'QRCODE', 2, 2) }}"
                            alt="barcode">
                    </td>
                    <td>{{ $outgoing_mail->employee->nip .'|'. $outgoing_mail->employee->name }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Surat Keluar Kosong</td>
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