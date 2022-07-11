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
                            <td class="col-7">Surat Keluar</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>No Surat</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $outgoing_mail->number }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Kode Surat</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $outgoing_mail->code }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Perihal</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $outgoing_mail->regarding }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Instansi</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $outgoing_mail->agency }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Penanggung Jawab</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $outgoing_mail->employee->name }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Jabatan</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $outgoing_mail->employee->position }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Ditandatangani Tanggal</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $outgoing_mail->created_at->isoFormat('dddd, D MMMM Y')
                                }}</td>
                        </tr>
                    </div>
                </table>
            </div>
        </div>
    </div>

    @include('backend.v1.templates.inc.script')
</body>

</html>