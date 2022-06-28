<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-KATAPANG</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    @include('backend.v1.templates.inc.head')
</head>

<body>
    <div class="wrapper">

        @include('backend.v1.templates.inc.navbar')

        @include('backend.v1.templates.inc.side')

        <div class="main-panel">
            <div class="content">
                <div class="panel-header bg-primary-gradient">
                    <div class="page-inner py-5">
                        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                            <div>
                                @yield('title')
                            </div>
                            <div class="ml-md-auto py-2 py-md-0">
                                @if (Auth::user()->rule !== 'User')
                                @yield('button')
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner mt--5">
                    @yield('content')
                </div>
            </div>
            @include('backend.v1.templates.inc.footer')
        </div>


    </div>
    @include('backend.v1.templates.inc.script')
    @include('sweetalert::alert')
</body>

</html>