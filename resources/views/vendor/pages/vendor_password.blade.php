@extends('vendor.vendor_master')
@section('vendor-content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">User Profile</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="container">
                <div class="main-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="post" action="{{ route('vendor.update-password') }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Current Password</h6>
                                            </div>
                                            <div class="input-group col-sm-9 text-secondary" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0" id="password"
                                                    name="current_password" placeholder="Enter Password"> <a
                                                    href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">New Password</h6>
                                            </div>
                                            <div class="input-group col-sm-9 text-secondary" id="show_hide_new_password">
                                                <input type="password" class="form-control border-end-0" id="password"
                                                    name="new_password" placeholder="Enter Password"> <a href="javascript:;"
                                                    class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Confirm Password</h6>
                                            </div>
                                            <div class="input-group col-sm-9 text-secondary"
                                                id="show_hide_confirm_password">
                                                <input type="password" class="form-control border-end-0" id="password"
                                                    name="confirm_password" placeholder="Enter Password"> <a
                                                    href="javascript:;" class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function() {
            $("#show_hide_new_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_new_password input').attr("type") == "text") {
                    $('#show_hide_new_password input').attr('type', 'password');
                    $('#show_hide_new_password i').addClass("bx-hide");
                    $('#show_hide_new_password i').removeClass("bx-show");
                } else if ($('#show_hide_new_password input').attr("type") == "password") {
                    $('#show_hide_new_password input').attr('type', 'text');
                    $('#show_hide_new_password i').removeClass("bx-hide");
                    $('#show_hide_new_password i').addClass("bx-show");
                }
            });
        });
        $(document).ready(function() {
            $("#show_hide_confirm_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_confirm_password input').attr("type") == "text") {
                    $('#show_hide_confirm_password input').attr('type', 'password');
                    $('#show_hide_confirm_password i').addClass("bx-hide");
                    $('#show_hide_confirm_password i').removeClass("bx-show");
                } else if ($('#show_hide_confirm_password input').attr("type") == "password") {
                    $('#show_hide_confirm_password input').attr('type', 'text');
                    $('#show_hide_confirm_password i').removeClass("bx-hide");
                    $('#show_hide_confirm_password i').addClass("bx-show");
                }
            });
        });
    </script>
@endsection
