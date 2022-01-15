<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Shop;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Checkout;

//start routes
Route::get('/',Home::class);
Route::get('/shop',Shop::class);
Route::get('/cart',Cart::class);
Route::get('/checkout',Checkout::class);







// end of routes
