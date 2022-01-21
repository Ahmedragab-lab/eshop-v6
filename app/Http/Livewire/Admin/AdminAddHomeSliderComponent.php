<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status=0;
    public $image;

    // real time validation----------------------------------------------------------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'title'      =>'required|min:3',
            'subtitle'   =>'required|min:3',
            'price'      =>'required|numeric|min:2',
            'link'       =>'required|url',
            'status'     =>'required|in:0,1',
            'image'      =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
    // end real time validation-

    public function store(){
    $validateData = $this->validate([
        'title'      =>'required|min:3',
        'subtitle'   =>'required|min:3',
        'price'      =>'required|numeric|min:2',
        'link'       =>'required|url',
        'status'     =>'required|in:0,1',
        'image'      =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
    $slider = new HomeSlider();
    $slider->title     = $this->title;
    $slider->subtitle  = $this->subtitle;
    $slider->price     = $this->price;
    $slider->link      = $this->link;
    $slider->status    = $this->status;

    $imageName = Carbon::now()->timestamp. '.' .$this->image->extension();
    $this->image->storeAs('sliders',$imageName);
    $slider->image = $imageName;
    $slider->save();
    session()->flash('Add','Homeslider added successfully');
    return redirect()->route('admin.homeslider');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('dashlayouts.master');
    }
}
