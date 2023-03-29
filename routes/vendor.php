<?php

use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

Route::get('vendor/login', [VendorController::class, 'vendorLogin'])
  ->name('vendor.login')->middleware(RedirectIfAuthenticated::class);;
Route::get('vendor/register', [VendorController::class, 'vendorRegister'])->name('vendor.register');
Route::get('vendor/forgot-password', [VendorController::class, 'vendorForgotPassword'])->name('vendor.forgot-password');
Route::get('become/vendor', [VendorController::class, 'becomeVendor'])->name('become.vendor');
Route::post('vendor/register', [VendorController::class, 'register'])->name('vendor.register');

Route::prefix('vendor')->middleware('auth', 'role:vendor')->group(function () {
  Route::get('dashboard', [VendorController::class, 'vendorDashboard']);
  Route::get('profile', [VendorController::class, 'vendorProfile'])->name('vendor.profile');
  Route::get('password', [VendorController::class, 'vendorPassword'])->name('vendor.password');
  Route::put('update-profile/{id}', [VendorController::class, 'vendorUpdateProfile'])->name('vendor.update-profile');
  Route::put('update-password', [VendorController::class, 'vendorUpdatePassword'])->name('vendor.update-password');
  Route::post('logout', [VendorController::class, 'vendorLogout'])->name('vendor.logout');
});