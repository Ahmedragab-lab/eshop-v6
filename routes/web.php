<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\User\Userdashboard;

//start routes
Route::get('/',Home::class);
Route::get('/shop',Shop::class);
Route::get('/cart',Cart::class);
Route::get('/checkout',Checkout::class);

// route for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard',Dashboard::class)->name('admin.dashboard');
});
// route for user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',Userdashboard::class)->name('user.dashboard');
});

