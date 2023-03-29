<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Rukada</h4>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
            <ul>
                <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Default</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Management Brand</div>
            </a>
            <ul>
                <li> <a href="{{ route('brands.index') }}"><i class="bx bx-right-arrow-alt"></i>List All Brand</a>
                </li>
                <li> <a href="{{ route('brands.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Brand</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Management Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('categories.index') }}"><i class="bx bx-right-arrow-alt"></i>List All
                        Category</a>
                </li>
                <li> <a href="{{ route('categories.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Management SubCategory</div>
            </a>
            <ul>
                <li> <a href="{{ route('subcategories.index') }}"><i class="bx bx-right-arrow-alt"></i>List All
                        SubCategory</a>
                </li>
                <li> <a href="{{ route('subcategories.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        SubCategory</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Management Vendor</div>
            </a>
            <ul>
                <li> <a href="{{ route('vendors.active') }}"><i class="bx bx-right-arrow-alt"></i>List Vendor
                        Active
                    </a>
                </li>
                <li> <a href="{{ route('vendors.inactive') }}"><i class="bx bx-right-arrow-alt"></i>List Vendor
                        Inactive
                    </a>
                </li>
            </ul>

        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Management Product</div>
            </a>
            <ul>
                <li> <a href="{{ route('products.index') }}"><i class="bx bx-right-arrow-alt"></i>
                        List all Product
                    </a>
                </li>
                <li> <a href="{{ route('products.create') }}"><i class="bx bx-right-arrow-alt"></i>
                        Add Product
                    </a>
                </li>
            </ul>

        </li>

        <li class="menu-label">UI Elements</li>
        <li>
            <a href="widgets.html">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title">Widgets</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">eCommerce</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>Products</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>Product
                        Details</a>
                </li>
                <li> <a href="ecommerce-add-new-products.html"><i class="bx bx-right-arrow-alt"></i>Add New
                        Products</a>
                </li>
                <li> <a href="ecommerce-orders.html"><i class="bx bx-right-arrow-alt"></i>Orders</a>
                </li>
            </ul>
        </li>
    </ul>
    <!--end navigation-->
</div>
