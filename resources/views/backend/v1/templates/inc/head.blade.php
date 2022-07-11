<link rel="icon" href="{{ url('templates/backend') }}/img/tapin.png" type="image/x-icon" />

<!-- Fonts and icons -->
<script src="{{ url('templates/backend') }}/js/plugin/webfont/webfont.min.js"></script>
<script>
    WebFont.load({
        google: {
            "families": ["Lato:300,400,700,900"]
        },
        custom: {
            "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                "simple-line-icons"
            ],
            urls: ['{{ url('templates/backend') }}/css/fonts.min.css']
        },
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script>

<!-- CSS Files -->
<link rel="stylesheet" href="{{ url('templates/backend') }}/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ url('templates/backend') }}/css/atlantis.min.css">
<link rel="stylesheet" href="{{ url('templates/backend') }}/css/myCustom.css">
{{-- https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ url('templates/backend') }}/css/table-ellipsis.css">

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ url('templates/backend') }}/css/demo.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">