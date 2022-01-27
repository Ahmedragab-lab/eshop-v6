<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;
class ProductDetails extends Component
{
    public $slug;
    public $qty=1;
    public function mount($slug){
        $this->slug = $slug;
    }
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item addded in cart');
        return redirect()->route('product.cart');
    }
    public function increaseQty(){
        $this->qty++;
    }
    public function decreaseQty(){
        if($this->qty > 1){
            $this->qty--;
        }
    }
    // public function addToWishlist($product_id,$product_name,$product_price){
    //     Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
    //     session()->flash('success_message','Item addded in wishlist');
    //     // return redirect()->route('product.cart');
    // }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('section_id',$product->section_id)->inRandomOrder()->limit(8)->get();
        return view('livewire.product-details',compact('product','popular_products','related_products'))
                   ->layout('layouts.master');
    }
}
