<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-KETAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('backend.v1.templates.inc.head')
</head>

<body>
    <h1 class="text-center">Laporan Surat Keputusan</h1>
    <h1 class="text-center">Dinas Ketahanan Pangan</h1>
    <div class="wrapper mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Surat</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">TTE Penanggung Jawab</th>
                    <th scope="col">Disposisi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($decrees as $decree)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $decree->number }}</td>
                    <td>{{ $decree->regarding }}</td>
                    <td>{{ date('d-m-Y', strtotime($decree->date)) }}</td>
                    <td>
                        <img class="p-3"
                            src="data:image/png;base64,{{ DNS2D::getBarcodePNG(route('decree.show', $decree->uuid), 'QRCODE', 2, 2) }}"
                            alt="barcode">
                    </td>
                    <td>{{ $decree->disposition }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Surat Keputusan Kosong</td>
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