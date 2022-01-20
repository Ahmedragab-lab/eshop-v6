<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ProductComponent extends Component
{
    public function delete($id){
        Product::destroy($id);
        session()->flash('Delete','Product deleteded successfully');
        return redirect()->route('admin.product');
     }
    public function render()
    {
        $products = Product::latest()->get();
        return view('livewire.admin.product-component',compact('products'))->layout('dashlayouts.master');
    }
}
