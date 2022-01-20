<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Section;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $section_id;
    public $product_name;
    public $slug;
    public $small_desc;
    public $desc;
    public $original_price;
    public $selling_price;
    public $sku;
    public $stock;
    public $feature;
    public $qty;
    public $image;

    public function mount(){
       $this->stock = 'instock';
       $this->feature = 0;
    }
    public function generateslug(){
       $this->slug = Str::slug($this->product_name,'-');
    }
    public function store(){
        // $validateData = $this->validate([
        //     'product_name'=>'required',
        //     'slug'        =>'required|unique:products,slug',
        //   ]);
        // Product::create($validateData);
        $product = new Product();
        $product->section_id     = $this->section_id;
        $product->product_name   = $this->product_name;
        $product->slug           = $this->slug;
        $product->small_desc     = $this->small_desc;
        $product->desc           = $this->desc;
        $product->original_price = $this->original_price;
        $product->selling_price  = $this->selling_price;
        $product->sku            = $this->sku;
        $product->stock          = $this->stock;
        $product->featured       = $this->feature;
        $product->qty            = $this->qty;
        $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image          = $imageName;
        $product->save();
        session()->flash('Add','Product added successfully');
        return redirect()->route('admin.product');
    }
    public function render()
    {
        $sections = Section::all();
        return view('livewire.admin.admin-add-product-component',compact('sections'))->layout('dashlayouts.master');
    }
}
