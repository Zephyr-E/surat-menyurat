{{-- <link rel="icon" href="{{ url('templates/backend') }}/img/icon.ico" type="image/x-icon" /> --}}

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

<!-- CSS Just for demo purpose, don't include it in your project -->
<link rel="stylesheet" href="{{ url('templates/backend') }}/css/demo.css">

{{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis officiis repudiandae voluptatum qui corporis facilis at quasi blanditiis, commodi quam veritatis, ad voluptate dolor neque dolores unde sint aliquam aperiam non. Libero ipsum error ratione accusantium culpa harum perferendis deleniti qui, sint est dolorum provident illum aperiam at eos quaerat, assumenda quos nihil eaque voluptatibus exercitationem soluta quidem! Omnis, saepe nihil at, aspernatur eius sapiente quo molestiae veritatis eaque rem dolor voluptatem explicabo assumenda beatae atque ratione minima obcaecati quaerat quis iste, est eveniet nisi. Sit, facilis et accusamus at nostrum vero cum porro placeat earum laudantium adipisci rem nemo magnam soluta quas, ut iste, aperiam veritatis iusto eum? Magnam, sunt deserunt ratione beatae cum voluptates, tempore repellat maxime voluptate enim assumenda architecto eos reprehenderit, ipsam autem ad minima pariatur dignissimos molestias ut inventore eligendi tempora! Natus, itaque quam. Provident earum esse ab perferendis odio qui minus voluptas possimus ut? --}}
