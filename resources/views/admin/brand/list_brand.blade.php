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
            <h6 class="mb-0 text-uppercase">Management Brand</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Created date</th>
                                    <th>Updated date</th>
                                    <th>View Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listBrands as $key => $brand)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td class="text-center">
                                            <img src="{{ asset('upload/brands/' . $brand->image) }}"
                                                style="width: 100px;height: 80px;">
                                        </td>
                                        <td>{{ Carbon::parse($brand->created_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ Carbon::parse($brand->updated_at)->format('d/m/Y H:i:s') }}</td>
                                        <td>
                                            <form action="{{ route('brands.show', [$brand->id]) }}" method="get">
                                                @csrf
                                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4">View
                                                    Details</button>
                                            </form>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <form action="{{ route('brands.edit', [$brand->id]) }}" method="get">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm radius-30 px-4">Edit</button>
                                                </form>
                                                <form action="{{ route('brands.destroy', [$brand->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm radius-30 px-4 show_confirm">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
