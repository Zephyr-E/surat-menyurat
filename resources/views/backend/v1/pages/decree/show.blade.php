<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-KETAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('backend.v1.templates.inc.head')
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card mx-2 mx-md-0">
                <div class="card-header text-center bg-light">
                    <i class="fas fa-check-circle text-success fa-3x"></i>
                    <br>
                    <h2><u>Kode QR Berhasil Terverifikasi</u></h2>
                </div>
                <table class="table">
                    <div class="card-body">
                        <tr>
                            <td class="col-4"><b>Jenis Surat</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">Surat Keputusan</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>No Surat</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $decree->number }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Perihal</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $decree->regarding }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Penanggung Jawab</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $decree->employee->name }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Jabatan</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $decree->employee->position }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Ditandatangani Tanggal</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $decree->created_at->isoFormat('dddd, D MMMM Y')
                                }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Disposisi</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $decree->disposition }}</td>
                        </tr>
                    </div>
                </table>
            </div>
        </div>
    </div>

    @include('backend.v1.templates.inc.script')
</body>

</html>