<script src="{{ asset('admin_backend/assets/js/bootstrap.bundle.min.js') }}"></script>

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
<script src="{{ asset('admin_backend/assets/plugins/datetimepicker/js/legacy.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/datetimepicker/js/picker.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/datetimepicker/js/picker.time.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/datetimepicker/js/picker.date.js') }}"></script>
<script src="{{ asset('admin_backend/assets/plugins/bootstrap-material-datetimepicker/js/moment.min.js') }}"></script>
<script
    src="{{ asset('admin_backend/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.min.js') }}">
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
