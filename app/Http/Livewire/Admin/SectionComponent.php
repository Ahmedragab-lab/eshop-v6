<?php

namespace App\Http\Livewire\Admin;

use App\Models\Section;
use Livewire\Component;

class SectionComponent extends Component
{
    public function render()
    {
        $sections = Section::select()->get();
        // $sections = Section::all();
        return view('livewire.admin.section-component',compact('sections'))->layout('dashlayouts.master');
    }
}
