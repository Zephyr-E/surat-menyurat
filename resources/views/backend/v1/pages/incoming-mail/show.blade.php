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
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td class="col-4"><b>Jenis Surat</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">Surat Masuk</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>No Surat</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->number }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Perihal</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->regarding }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Instansi</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->agency }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Penandatangan</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->employee->name }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>NIK</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->employee->nip }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>NIP</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->employee->nip }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Jabatan</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->employee->position }}</td>
                        </tr>
                        <tr>
                            <td class="col-4"><b>Ditandatangani Tanggal</b></td>
                            <td class="col-1">:</td>
                            <td class="col-7">{{ $incoming_mail->created_at->isoFormat('dddd, D MMMM Y')
                                }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('backend.v1.templates.inc.script')
</body>

</html>