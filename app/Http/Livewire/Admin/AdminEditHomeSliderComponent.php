<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
class AdminEditHomeSliderComponent extends Component
{

    use WithFileUploads;
    public $slider_id;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    public $newimage;
    public function mount($slide_id){
        $slider = HomeSlider::where('id',$slide_id)->first();
        $this->title      = $slider->title ;
        $this->subtitle   = $slider->subtitle  ;
        $this->price      = $slider->price ;
        $this->link       = $slider->link ;
        $this->status     = $slider->status ;
        $this->image      = $slider->image;
        $this->slider_id  = $slider->id;
    }
     // real time validation----------------------------------------------------------------------------
     public function updated($propertyName)
     {
         $this->validateOnly($propertyName, [
             'title'      =>'required|min:3',
             'subtitle'   =>'required|min:3',
             'price'      =>'required|numeric|min:2',
             'link'       =>'required|url',
             'status'     =>'required|in:0,1',
            //  'image'      =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
     }
     // end real time validation-


     public function update(){
        $validateData = $this->validate([
             'title'      =>'required|min:3',
             'subtitle'   =>'required|min:3',
             'price'      =>'required|numeric|min:2',
             'link'       =>'required|url',
             'status'     =>'required|in:0,1',
          ]);
        $slider = HomeSlider::findorfail($this->slider_id);
        $slider->title     = $this->title ;
        $slider->subtitle  = $this->subtitle ;
        $slider->price     = $this->price  ;
        $slider->link      = $this->link  ;
        $slider->status    = $this->status ;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp. '.' .$this->newimage->extension();
            $this->newimage->storeAs('sliders',$imageName);
            $slider->image  = $imageName;
        }
        $slider->update();
        session()->flash('Edit','Homeslider updated successfully');
        return redirect()->route('admin.homeslider');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('dashlayouts.master');
    }
}
