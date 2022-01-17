<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;

class HeaderSearchComponent extends Component
{
    public $search;
    public $product_cate;
    public $product_cate_id;
    public function mount(){
        $this->product_cate = 'All Category';
        $this->fill(request()->only('search','product_cate','product_cate_id'));
    }
    public function render()
    {
        $sections = Section::all();
        return view('livewire.header-search-component',compact('sections'));
    }
}
