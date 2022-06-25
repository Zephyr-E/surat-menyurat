<!--   Core JS Files   -->
<script src="{{ url('templates/backend') }}/js/core/jquery.3.2.1.min.js"></script>
<script src="{{ url('templates/backend') }}/js/core/popper.min.js"></script>
<script src="{{ url('templates/backend') }}/js/core/bootstrap.min.js"></script>

<!-- jQuery UI -->
<script src="{{ url('templates/backend') }}/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="{{ url('templates/backend') }}/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<!-- Sweet Alert -->
<script src="{{ url('templates/backend') }}/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{ url('templates/backend') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Atlantis JS -->
<script src="{{ url('templates/backend') }}/js/atlantis.min.js"></script>

<!-- Atlantis DEMO methods, don't include it in your project! -->
<script src="{{ url('templates/backend') }}/js/setting-demo.js"></script>
<script src="{{ url('templates/backend') }}/js/setting-demo2.js"></script>

<script>
	var SweetAlert2Demo = function() {

        //== Demos
        var initDemos = function() {
            $('#alert_demo_6').click(function(e) {
                swal("This modal will disappear soon!", {
                    buttons: false,
                    timer: 3000,
                });
            });
        };

        $('#alert_demo_7').click(function(e) {
					swal({
						title: 'Are you sure?',
						text: "You won't be able to revert this!",
						type: 'warning',
						buttons:{
							confirm: {
								text : 'Yes, delete it!',
								className : 'btn btn-success'
							},
							cancel: {
								visible: true,
								className: 'btn btn-danger'
							}
						}
					}).then((Delete) => {
						if (Delete) {
							swal({
								title: 'Deleted!',
								text: 'Your file has been deleted.',
								type: 'success',
								buttons : {
									confirm: {
										className : 'btn btn-success'
									}
								}
							});
						} else {
							swal.close();
						}
					});
				});

                return {
                //== Init
                init: function() {
                    initDemos();
                },
            };
        }();


        //== Class Initialization
		jQuery(document).ready(function() {
			SweetAlert2Demo.init();
		});

</script>