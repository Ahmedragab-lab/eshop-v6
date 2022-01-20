<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public function render()
    {
        $products = Product::latest()->get();
        return view('livewire.admin.product-component',compact('products'))->layout('dashlayouts.master');
    }
}
