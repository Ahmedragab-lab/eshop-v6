<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Section;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Component;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $product_id;
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
    public $newimage;

    public function mount($product_slug){
        $product = Product::where('slug',$product_slug)->first();
        $this->section_id       = $product->section_id;
        $this->product_name     = $product->product_name;
        $this->slug             = $product->slug;
        $this->small_desc       = $product->small_desc;
        $this->desc             = $product->desc;
        $this->original_price   = $product->original_price;
        $this->selling_price    = $product->selling_price;
        $this->sku              = $product->SKU;
        $this->stock            = $product->stock;
        $this->feature          = $product->featured;
        $this->qty              = $product->qty;
        $this->image            = $product->image;
        $this->product_id       = $product->id;
    }
    public function generateslug(){
       $this->slug = Str::slug($this->product_name,'-');
    }
    public function update(){
        // $validateData = $this->validate([
        //     'section_name'=>'required',
        //     // 'section_name'=>'required|unique:table,column,except',$this->section_name,
        //     'slug'        =>'required|unique:sections',
        //   ]);
        $product = Product::findorfail($this->product_id);
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
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image      = $imageName;
        }
        $product->update();
        session()->flash('Edit','Product updated successfully');
        return redirect()->route('admin.product');
    }

    public function render()
    {
        $sections = Section::all();
        return view('livewire.admin.admin-edit-product-component',compact('sections'))->layout('dashlayouts.master');
    }
}
