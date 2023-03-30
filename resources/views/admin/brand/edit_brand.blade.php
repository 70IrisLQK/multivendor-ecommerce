@extends('admin.admin_master')
@section('admin-content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Brand</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i
                                        class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Management Brand</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-7 mx-auto">
                    <h6 class="mb-0 text-uppercase">Management Brand</h6>
                    <hr>
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Update Brand</h5>
                            </div>
                            <hr>
                            <form class="row g-3" method="POST" action="{{ route('brands.update', [$getBrandById->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $getBrandById->name }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="inputFirstName" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                                <div class="col-md-12">
                                    <img src="{{ !empty($getBrandById->image) ? asset('upload/brands/' . $getBrandById->image) : asset('admin_backend/assets/images/no_image.jpg') }}"
                                        class="rounded-circle p-1 bg-primary" width="110" id="show_image">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-5">Update Brand</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#image').change(function(e) {
                        e.preventDefault();
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#show_image').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(e.target.files['0']);
                    })
                })
            </script>
        </div>
    </div>
@endsection
