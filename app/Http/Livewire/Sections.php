<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Section;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
class Sections extends Component
{
    use WithPagination;
    public $sorting;
    public $pagesize;
    public $slug;
    public function mount($slug){
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->slug = $slug;
    }


    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item addded in cart');
        return redirect()->route('product.cart');
    }



    public function render()
    {
        $sections = Section::all();
        $section = Section::where('slug',$this->slug)->first();
        $section_id = $section->id;
        $section_name = $section->section_name;

        if($this->sorting=='date'){
          $products = Product::where('section_id', $section_id)->orderByDesc('created_at')->paginate($this->pagesize);
        }elseif($this->sorting=='price'){
            $products = Product::where('section_id', $section_id)->orderBy('original_price')->paginate($this->pagesize);
        }elseif($this->sorting=='price-desc'){
            $products = Product::where('section_id', $section_id)->orderByDesc('original_price')->paginate($this->pagesize);
        }else{
            $products = Product::where('section_id', $section_id)->paginate($this->pagesize);
        }
        return view('livewire.section',compact('products','sections','section_name'))->layout('layouts.master');
    }
}
