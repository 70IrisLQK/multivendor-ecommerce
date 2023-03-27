<?php

use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;

Route::prefix('vendor')->middleware('auth', 'role:vendor')->group(function () {
  Route::get('dashboard', [VendorController::class, 'vendorDashboard']);
});