<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-KATAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('backend.v1.templates.inc.head')
</head>

<body>
    <form action="" method="POST">
        <div class="form-group">
            <label for="number">NIP : {{ $employee->nip }}</label>
        </div>
        <div class="form-group">
            <label for="number">NIK : {{ $employee->nik }}</label>
        </div>
        <div class="form-group">
            <label for="number">Nama : {{ $employee->name }}</label>
        </div>
        <div class="form-group">
            <label for="number">Jabatan : {{ $employee->position }}</label>
        </div>
    </form>

    @include('backend.v1.templates.inc.script')
</body>

</html>