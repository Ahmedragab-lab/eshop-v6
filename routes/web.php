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
Route::get('/search',Livewire\SearchComponent::class)->name('product.search');

// route for admin
Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function () {
    Route::get('/admin/dashboard',Livewire\Admin\Dashboard::class)->name('admin.dashboard');

    Route::get('/admin/section',Livewire\Admin\SectionComponent::class)->name('admin.section');
    Route::get('/admin/section/add',Livewire\Admin\AdminAddSectionComponent::class)->name('admin.addsection');
    Route::get('/admin/section/edit/{section_slug}',Livewire\Admin\AdminEditSectionComponent::class)->name('admin.editsection');

    Route::get('/admin/product',Livewire\Admin\ProductComponent::class)->name('admin.product');
    Route::get('/admin/product/add',Livewire\Admin\AdminAddProductComponent::class)->name('admin.addproduct');
    Route::get('/admin/product/edit/{product_slug}',Livewire\Admin\AdminEditProductComponent::class)->name('admin.editproduct');

    Route::get('/admin/slider',Livewire\Admin\AdminHomeSliderComponent::class)->name('admin.homeslider');
    Route::get('/admin/slider/add',Livewire\Admin\AdminAddHomeSliderComponent::class)->name('admin.addhomeslider');
    Route::get('/admin/slider/edit/{slide_id}',Livewire\Admin\AdminEditHomeSliderComponent::class)->name('admin.edithomeslider');
});
// route for user
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard',Livewire\User\Userdashboard::class)->name('user.dashboard');
});

