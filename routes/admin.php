<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
  Route::get('dashboard', [AdminController::class, 'adminDashboard']);
});