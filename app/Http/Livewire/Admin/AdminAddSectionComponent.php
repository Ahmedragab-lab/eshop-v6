<?php

namespace App\Http\Livewire\Admin;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Str;


class AdminAddSectionComponent extends Component
{

    public $section_name;
    public $slug;

    public function generateslug(){
       $this->slug = Str::slug($this->section_name);
    }
    public function store(){
        $validateData = $this->validate([
            'section_name'=>'required|unique:sections,section_name',
            'slug'        =>'required|unique:sections,slug',
          ]);
        Section::create($validateData);
        session()->flash('Add','Section added successfully');
        return redirect()->route('admin.section');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-section-component')->layout('dashlayouts.master');
    }
}
