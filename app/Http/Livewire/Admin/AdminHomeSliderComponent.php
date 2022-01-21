<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{

    public function delete($id){
        HomeSlider::destroy($id);
        session()->flash('Delete','Homeslider deleteded successfully');
        return redirect()->route('admin.homeslider');
     }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',compact('sliders'))->layout('dashlayouts.master');
    }
}
