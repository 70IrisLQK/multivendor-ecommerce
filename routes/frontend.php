<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class, 'index']);
Route::get('/login', [FrontendController::class, 'login'])->name('login');
Route::get('/register', [FrontendController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
  Route::get('/account', [FrontendController::class, 'getAccount'])->name('account');
  Route::put('/update-profile', [FrontendController::class, 'updateProfile'])->name('user.profile');
  Route::put('/update-password', [FrontendController::class, 'updatePassword'])->name('user.password');
});