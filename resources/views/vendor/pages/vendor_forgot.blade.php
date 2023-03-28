<!doctype html>
<html lang="en">

<head>
    @include('vendor.inc.vendor_header_css')
</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="authentication-forgot d-flex align-items-center justify-content-center">
            <div class="card forgot-box">
                <div class="card-body">
                    <div class="p-4 rounded  border">
                        <div class="text-center">
                            <img src="assets/images/icons/forgot-2.png" width="120" alt="" />
                        </div>
                        <h4 class="mt-5 font-weight-bold">Forgot Password?</h4>
                        <p class="text-muted">Enter your registered email ID to reset the password</p>
                        <div class="my-4">
                            <label class="form-label">Email id</label>
                            <input type="text" class="form-control form-control-lg" placeholder="example@user.com" />
                        </div>
                        <div class="d-grid gap-2">
                            <button type="button" class="btn btn-primary btn-lg">Send</button> <a
                                href="authentication-signin.html" class="btn btn-light btn-lg"><i
                                    class='bx bx-arrow-back me-1'></i>Back to Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    @include('vendor.inc.vendor_script')
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
</body>

</html>
