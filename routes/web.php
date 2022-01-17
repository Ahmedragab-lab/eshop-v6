<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire;

//start routes
Route::get('/',Livewire\Home::class);
Route::get('/shop',Livewire\Shop::class);
Route::get('/cart',Livewire\CartComponent::class)->name('product.cart');
Route::get('/checkout',Livewire\Checkout::class);
Route::get('/product/{slug}',Livewire\ProductDetails::class)->name('product.details');
Route::get('/section/{slug}',Livewire\Sections::class)->name('product.section');

// route for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard',Livewire\Admin\Dashboard::class)->name('admin.dashboard');
});
// route for user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',Livewire\User\Userdashboard::class)->name('user.dashboard');
});

