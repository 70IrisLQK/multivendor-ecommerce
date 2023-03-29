<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AdminController::class, 'adminLogin'])->name('admin.login')
  ->middleware(RedirectIfAuthenticated::class);
Route::get('admin/register', [AdminController::class, 'adminRegister'])->name('admin.register');
Route::get('admin/forgot-password', [AdminController::class, 'adminForgotPassword'])->name('admin.forgot-password');

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
  Route::get('dashboard', [AdminController::class, 'adminDashboard']);
  Route::get('profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
  Route::get('password', [AdminController::class, 'adminPassword'])->name('admin.password');
  Route::put('update-profile/{id}', [AdminController::class, 'adminUpdateProfile'])->name('admin.update-profile');
  Route::put('update-password', [AdminController::class, 'adminUpdatePassword'])->name('admin.update-password');
  Route::post('logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

  //Route Brand
  Route::resource('brands', BrandController::class);

  //Route Category
  Route::get('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
  Route::resource('categories', CategoryController::class);

  //Route SubCategory
  Route::resource('subcategories', SubCategoryController::class);

  // Route vendor
  Route::get('vendors/active', [VendorController::class, 'getActiveVendor'])->name('vendors.active');
  Route::get('vendors/inactive', [VendorController::class, 'getInactiveVendor'])->name('vendors.inactive');
  Route::post('vendors/update-status', [VendorController::class, 'updateStatus']);

  // Route product
  Route::resource('products', ProductController::class);
});