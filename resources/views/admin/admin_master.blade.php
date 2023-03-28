<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.inc.admin_header_css')
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.body.admin_sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        @include('admin.body.admin_header')
        <!--end header -->
        <!--start page wrapper -->
        @yield('admin-content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('admin.body.admin_footer')
    </div>
    <!--end wrapper-->
    <!--start switcher-->
    @include('admin.body.admin_switcher')
    <!--end switcher-->
    <!-- Bootstrap JS -->
    @include('admin.inc.admin_script')
</body>

</html>
