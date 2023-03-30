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
            <h6 class="mb-0 text-uppercase">Management Product</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Product Name</th>
                                    <th>Product Slug</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Created date</th>
                                    <th>Updated date</th>
                                    <th>View Details</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listProductsById as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>{{ $product->qty }}</td>
                                        <td>
                                            @if (empty($product->discount_price))
                                                <div
                                                    class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                    No Discount
                                                </div>
                                            @else
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $discount = ($amount / $product->selling_price) * 100;
                                                @endphp
                                                <div
                                                    class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">
                                                    {{ round($discount, 1) }}%
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status == 'active')
                                                <div
                                                    class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">
                                                    <i class="bx bxs-circle me-1"></i>{{ $product->status }}
                                                </div>
                                            @else
                                                <div
                                                    class="badge rounded-pill text-warning bg-light-warning p-2 text-uppercase px-3">
                                                    <i class="bx bxs-circle me-1"></i>{{ $product->status }}
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset('upload/products/thumbnail/' . $product->thumbnail) }}"
                                                alt="" style="width: 70px; height: 40px;">
                                        </td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm radius-30 px-4">View
                                                Details</button>
                                        </td>
                                        <td>
                                            <div class="d-flex order-actions">
                                                <a href="{{ route('products.edit', [$product->id]) }}" class=""><i
                                                        class="bx bxs-edit"></i></a>
                                                <a id="delete" href="{{ route('products.destroy', [$product->id]) }}"
                                                    class="ms-1"><i class="bx bxs-trash"></i></a>
                                                <a id="delete" href="{{ route('products.destroy', [$product->id]) }}"
                                                    class="ms-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-thumbs-up text-primary">
                                                        <path
                                                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                        </path>
                                                    </svg></a>
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
