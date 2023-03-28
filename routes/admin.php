<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');
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
});