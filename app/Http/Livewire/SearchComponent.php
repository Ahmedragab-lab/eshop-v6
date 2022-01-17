<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $search;
    public $product_cate;
    public $product_cate_id;

    public function mount(){
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->fill(request()->only('search','product_cate','product_cate_id'));
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
          $products = Product::where('product_name','like','%'.$this->search.'%')
          ->where('section_id','like','%'.$this->product_cate_id.'%')
          ->orderByDesc('created_at')->paginate($this->pagesize);
        }elseif($this->sorting=='price'){
            $products = Product::where('product_name','like','%'.$this->search.'%')
            ->where('section_id','like','%'.$this->product_cate_id.'%')
            ->orderBy('original_price')->paginate($this->pagesize);
        }elseif($this->sorting=='price-desc'){
            $products = Product::where('product_name','like','%'.$this->search.'%')
            ->where('section_id','like','%'.$this->product_cate_id.'%')
            ->orderByDesc('original_price')->paginate($this->pagesize);
        }else{
            $products = Product::where('product_name','like','%'.$this->search.'%')
            ->where('section_id','like','%'.$this->product_cate_id.'%')
            ->paginate($this->pagesize);
        }
        return view('livewire.search-component',compact('products','sections'))->layout('layouts.master');

    }
}



