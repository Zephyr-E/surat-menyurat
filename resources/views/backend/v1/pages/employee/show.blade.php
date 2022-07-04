<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-KETAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('backend.v1.templates.inc.head')
</head>

<body>
    <div class="container col-8">
        <div class="card">
            <div class="card-header text-center bg-light">
                <i class="fas fa-check-circle text-success fa-3x"></i>
                <br>
                <h2><u>Kode QR Berhasil Terverifikasi</u></h2>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="number" class="col-4">NIP</label>
                        <label for="number">:</label>
                        <label for="number" class="col-1">{{ $employee->nip }}</label>
                    </div>
                    <div class="form-group">
                        <label for="number" class="col-4">NIK</label>
                        <label for="number">:</label>
                        <label for="number" class="col-1">{{ $employee->nik }}</label>
                    </div>
                    <div class="form-group">
                        <label for="number" class="col-4">Nama Pegawai</label>
                        <label for="number">:</label>
                        <label for="number" class="col-1">{{ $employee->name }}</label>
                    </div>
                    <div class="form-group">
                        <label for="number" class="col-4">Jabatan Pegawai</label>
                        <label for="number">:</label>
                        <label for="number" class="col-1">{{ $employee->position }}</label>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('backend.v1.templates.inc.script')
</body>

</html>