<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('vendor.inc.vendor_header_css')
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('vendor.body.vendor_sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('vendor.body.vendor_header')
        <!--end header -->
        <!--start page wrapper -->
        @yield('vendor-content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('vendor.body.vendor_footer')
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    @include('vendor.body.vendor_switcher')
    <!--end switcher-->
    <!-- Bootstrap JS -->
    @include('vendor.inc.vendor_script')
</body>

</html>
