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
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item addded in cart');
        return redirect()->route('product.cart');
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
