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
    // real time validation----------------------------------------------------------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'section_name'=>'required|min:3',
            'slug'        =>'required|unique:sections,slug',
        ]);
    }
 // end real time validation-
    public function store(){
        try {
            $validateData = $this->validate([
                'section_name'=>'required',
                'slug'        =>'required|unique:sections,slug',
            ]);
            Section::create($validateData);
            session()->flash('Add','Section added successfully');
            return redirect()->route('admin.section');
        }catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }
    public function render()
    {
        return view('livewire.admin.admin-add-section-component')->layout('dashlayouts.master');
    }
}
