<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        return view('livewire.home',compact('sliders'))->layout('layouts.master');

    }
}
