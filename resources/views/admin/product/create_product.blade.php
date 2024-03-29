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
                    <h5 class="card-title">Add New Product</h5>
                    <hr>
                    <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
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
                                                placeholder="Enter product title" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Tags</label>
                                            <input type="text" class="form-control visually-hidden" data-role="tagsinput"
                                                name="tags">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Size</label>
                                            <input type="text" class="form-control visually-hidden" data-role="tagsinput"
                                                name="size">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Product Color</label>
                                            <input type="text" class="form-control visually-hidden" data-role="tagsinput"
                                                name="color">
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputProductDescription" class="form-label">Short
                                                Description</label>
                                            <textarea class="form-control" id="inputProductDescription" rows="3" name="short_description"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputProductTitle" class="form-label">Long Description</label>
                                            <textarea id="mytextarea" name="long_description" aria-hidden="true"></textarea>
                                        </div>
                                        <div class="mb-3">
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
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="border border-3 p-4 rounded">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputPrice" class="form-label">Price</label>
                                                <input type="number" class="form-control" id="inputPrice"
                                                    placeholder="00.00" name="selling_price">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCompareatprice" class="form-label">Discount Price</label>
                                                <input type="number" class="form-control" id="inputCompareatprice"
                                                    placeholder="00.00" name="discount_price">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCostPerPrice" class="form-label">Product Code</label>
                                                <input type="text" class="form-control" id="inputCostPerPrice"
                                                    placeholder="Product code" name="code">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputStarPoints" class="form-label">Product Quantity</label>
                                                <input type="number" class="form-control" id="inputStarPoints"
                                                    placeholder="0" name="qty">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputProductType" class="form-label">Product Brand</label>
                                                <select class="form-select" id="inputProductType" name="brand_id">
                                                    <option value="">Open to select brand</option>
                                                    @foreach ($listBrand as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputVendor" class="form-label">Product Category</label>
                                                <select class="form-select" id="inputVendor" name="category_id">
                                                    <option value="">Open to select category</option>
                                                    @foreach ($listCategory as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-12">
                                                <label for="inputCollection" class="form-label">Product
                                                    SubCategory</label>
                                                <select class="form-select" id="inputCollection" name="subcategory_id">
                                                    <option value="">Open to select subcategory</option>
                                                    @foreach ($listSubCategory as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputVendor" class="form-label">Vendor</label>
                                                <select class="form-select" id="inputVendor" name="vendor_id">
                                                    <option value="">Open to select vendor</option>
                                                    @foreach ($activeVendor as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox2" name="hot_deals">
                                                        <label class="form-check-label" for="inlineCheckbox2">Hot
                                                            Deals</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox2" name="featured">
                                                        <label class="form-check-label"
                                                            for="inlineCheckbox2">Featured</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox2" name="special_deals">
                                                        <label class="form-check-label" for="inlineCheckbox2">Special
                                                            Deals</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="inlineCheckbox2" name="special_offer">
                                                        <label class="form-check-label" for="inlineCheckbox2">Special
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

    </div>
@endsection
