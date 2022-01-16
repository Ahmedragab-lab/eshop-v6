<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire;

//start routes
Route::get('/',Livewire\Home::class);
Route::get('/shop',Livewire\Shop::class);
Route::get('/cart',Livewire\Cart::class);
Route::get('/checkout',Livewire\Checkout::class);

// route for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard',Livewire\Admin\Dashboard::class)->name('admin.dashboard');
});
// route for user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',Livewire\User\Userdashboard::class)->name('user.dashboard');
});

