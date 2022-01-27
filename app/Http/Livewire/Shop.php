<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class Shop extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;
    }


    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item addded in cart');
        return redirect()->route('product.cart');
    }
    public function addToWishlist($product_id,$product_name,$product_price){
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        // session()->flash('success_message','Item addded in wishlist');
    }
    public function removeWishlist($product_id){
        foreach(Cart::instance('wishlist')->content() as $item){
          if($item->id == $product_id){
             Cart::instance('wishlist')->remove($item->rowId);
             $this->emitTo('wishlist-count-component','refreshComponent');
             return;
          }
        }
     }


    public function render()
    {
        $sections = Section::latest()->get();
        if($this->sorting=='date'){
          $products = Product::orderByDesc('created_at')->paginate($this->pagesize);
        }elseif($this->sorting=='price'){
            $products = Product::orderBy('original_price')->paginate($this->pagesize);
        }elseif($this->sorting=='price-desc'){
            $products = Product::orderByDesc('original_price')->paginate($this->pagesize);
        }else{
            $products = Product::paginate($this->pagesize);
        }
        return view('livewire.shop',compact('products','sections'))->layout('layouts.master');
    }
}
