<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;

// Route::get('/', function () {
//     return view('front');
// });
Route::get('/',Home::class);
// end of routes
