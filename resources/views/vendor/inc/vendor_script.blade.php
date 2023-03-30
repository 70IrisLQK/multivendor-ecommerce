<script src="{{ asset('admin_backend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/js/custom.js') }}"></script>

<!--plugins-->
<script src="{{ asset('admin_backend/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/jquery-knob/excanvas.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
<script>
    $(function() {
        $(".knob").knob();
    });
</script>
<script src="{{ asset('admin_backend/assets/js/index.js') }}"></script>
<!--app JS-->
<script src="{{ asset('admin_backend/assets/js/app.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="{{ asset('admin_backend/assets/js/code.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#mytextarea'
    });
</script>

<script>
    $('.datepicker').pickadate({
            selectMonths: true,
            selectYears: true,
            format: 'dd/mm/yyyy',
            max: new Date()
        }),
        $('.timepicker').pickatime()
</script>
