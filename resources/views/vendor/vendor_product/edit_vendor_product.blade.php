@extends('admin.admin_master')
@section('admin-content')
    <div class="page-wrapper">
        <div class="page-content">

            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">eCommerce</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Update Product</h5>
                    <hr>
                    <form method="post" action="{{ route('products.update', [$getProductById->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Name</label>
                                            <input type="text" class="form-control" id="inputProductTitle"
                                                placeholder="Enter product title" name="name"
                                                value="{{ $getProductById->name }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Tags</label>
                                            <input type="text" class="form-control visually-hidden" data-role="tagsinput"
                                                name="tags" value="{{ $getProductById->tags }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Size</label>
                                            <input type="text" class="form-control visually-hidden" data-role="tagsinput"
                                                name="size" value="{{ $getProductById->size }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Color</label>
                                            <input type="text" class="form-control visually-hidden" data-role="tagsinput"
                                                name="color" value="{{ $getProductById->color }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Short
                                                Description</label>
                                            <textarea class="form-control" id="inputProductDescription" rows="3" name="short_description">{{ $getProductById->short_description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Long Description</label>
                                            <textarea id="mytextarea" name="long_description" aria-hidden="true">{!! $getProductById->long_description !!}</textarea>
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Main Thumbnail</label>
                                            <input class="form-control" type="file" id="formFile"
                                                onchange="mainThumb(this)" name="thumbnail">
                                        </div>
                                        <div class="mb-3">
                                            <img src="" id="show_main_thumb">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Multiple Image</label>
                                            <input class="form-control" type="file" multiple="" id="multiImg"
                                                name="multi_image[]">
                                        </div>
                                        <div class="mb-3">
                                            <div class="row" id="preview_img"></div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputPrice" class="form-label">Price</label>
                                                <input type="number" class="form-control" id="inputPrice"
                                                    placeholder="00.00" name="selling_price"
                                                    value="{{ $getProductById->selling_price }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCompareatprice" class="form-label">Discount Price</label>
                                                <input type="number" class="form-control" id="inputCompareatprice"
                                                    placeholder="00.00" name="discount_price"
                                                    value="{{ $getProductById->discount_price }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCostPerPrice" class="form-label">Product Code</label>
                                                <input type="text" class="form-control" id="inputCostPerPrice"
                                                    placeholder="00.00" name="code" value="{{ $getProductById->code }}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Product Quantity</label>
                                                <input type="number" class="form-control" id="inputStarPoints"
                                                    placeholder="0" name="qty" value="{{ $getProductById->qty }}">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputProductType" class="form-label">Product Brand</label>
                                                <select class="form-select" id="inputProductType" name="brand_id">
                                                    <option value="">Open to select brand</option>
                                                    @foreach ($listBrand as $item)
                                                        <option
                                                            {{ $getProductById->brand_id == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputVendor" class="form-label">Product Category</label>
                                                <select class="form-select" id="inputVendor" name="category_id">
                                                    <option value="">Open to select category</option>
                                                    @foreach ($listCategory as $item)
                                                        <option
                                                            {{ $getProductById->category_id == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputCollection" class="form-label">Product
                                                    SubCategory</label>
                                                <select class="form-select" id="inputCollection" name="subcategory_id">
                                                    <option value="">Open to select subcategory</option>
                                                    @foreach ($listSubCategory as $item)
                                                        <option
                                                            {{ $getProductById->subcategory_id == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexCheckDefault" name="hot_deal" value="1"
                                                            {{ $getProductById->hot_deals == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">Hot
                                                            Deals</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexCheckDefault" name="featured"
                                                            {{ $getProductById->featured == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="flexCheckDefault">Featured</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexCheckDefault" name="special_deals"
                                                            {{ $getProductById->special_deals == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">Special
                                                            Deals</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexCheckDefault" name="special_offer"
                                                            {{ $getProductById->special_offer == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">Special
                                                            Offer
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Save Product</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="page-content">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Update Thumbnail Product</h5>
                    <hr>
                    <form method="post" action="{{ route('products.update-thumb', [$getProductById->id]) }}"
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
                        <div class="form-body mt-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Main Thumbnail</label>
                                            <input class="form-control" type="file" id="formFile"
                                                onchange="mainThumb(this)" name="thumbnail">
                                        </div>
                                        <div class="mb-3">
                                            <img src="{{ asset('upload/products/thumbnail/' . $getProductById->thumbnail) }}"
                                                id="show_main_thumb" style="width: 120px;height:120px">
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Multiple Image</label>
                                            <input class="form-control" type="file" multiple="" id="multiImg"
                                                name="multi_image[]">
                                        </div>
                                        <div class="mb-3">
                                            <div class="row" id="preview_img"></div>
                                        </div> --}}
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Update Thumbnail
                                                Product</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="page-content">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="card-title">Update Multi Image Product</h5>
                    <hr>
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Change Image</th>
                                        <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($multiImages as $key => $item)
                                        <form action="{{ route('products.update-multi-images', [$item->id]) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>
                                                    <img src="{{ asset('upload/products/multi_images/' . $item->image_name) }}"
                                                        style="width: 75px;height:75px">
                                                </td>
                                                <td>
                                                    <div class="mb-3">
                                                        <input class="form-control" type="file" multiple=""
                                                            id="multiImg" name="multi_images[{{ $item->id }}]">
                                                    </div>

                                                </td>
                                                <td>

                                                    <button type="submit"
                                                        class="btn btn-primary btn-sm radius-30 px-4">Update</button>
                                        </form>
                                        <form action="{{ route('products.destroy', [$item->id]) }}" method="post">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit"
                                                class="btn btn-secondary btn-sm radius-30 px-4">Delete</button>
                                        </form>
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
    </div>
@endsection
