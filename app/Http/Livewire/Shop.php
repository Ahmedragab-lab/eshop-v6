<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;
    public function render()
    {
        $products = Product::paginate('12');
        return view('livewire.shop',compact('products'))->layout('layouts.master');
    }
}
