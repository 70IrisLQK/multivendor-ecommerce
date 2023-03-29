@extends('admin.admin_master')
@section('admin-content')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Tables</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">Management vendor</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Shop Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Shop Info</th>
                                    <th>Shop Start date</th>
                                    <th>Photo</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created date</th>
                                    <th>Updated date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listActiveVendor as $vendor)
                                    <tr>
                                        <td>{{ $vendor->name }}</td>
                                        <td>{{ $vendor->email }}</td>
                                        <td>{{ $vendor->phone }}</td>
                                        <td>{{ $vendor->address }}</td>
                                        <td>{{ $vendor->vendor_info }}</td>
                                        <td>{{ Carbon::parse($vendor->vendor_joined_at)->format('d/m/Y') }}</td>
                                        <td>
                                            <img src="{{ asset('upload/avatars/' . $vendor->photo) }}" width="120px">
                                        </td>
                                        <td>{{ $vendor->role }}</td>
                                        <td>
                                            <select class="form-select status_choose" id="{{ $vendor->id }}">
                                                <option
                                                    {{ isset($vendor->status) && $vendor->status == 'active' ? 'selected' : '' }}
                                                    value="active">Active</option>
                                                <option
                                                    {{ isset($vendor->status) && $vendor->status == 'inactive' ? 'selected' : '' }}
                                                    value="inactive">Inactive</option>
                                            </select>
                                        </td>
                                        <td>{{ $vendor->created_at }}</td>
                                        <td>{{ $vendor->updated_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Shop Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Shop Info</th>
                                    <th>Shop Start date</th>
                                    <th>Photo</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Created date</th>
                                    <th>Updated date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
