<?php

namespace App\Http\Livewire\Admin;

use App\Models\Section;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditSectionComponent extends Component
{
    public $section_id;
    public $section_name;
    public $slug;

    public function mount($section_slug){
        $section = Section::where('slug',$section_slug)->first();
        $this->section_id   = $section->id;
        $this->section_name = $section->section_name;
        $this->slug         = $section->slug;
    }

    public function generateslug(){
        $this->slug = Str::slug($this->section_name);
     }
 // real time validation----------------------------------------------------------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'section_name'=>'required|min:3',
            'slug'        =>'required|unique:sections,slug,'.$this->section_id,
        ]);
    }
 // end real time validation-
      public function update(){
        $validateData = $this->validate([
            'section_name'=>'required|min:3',
            'slug'        =>'required|unique:sections,slug,'.$this->section_id,
          ]);
        $section = Section::findorfail($this->section_id);
        $section->update($validateData,
            // [
            //     'section_name' =>$this->section_name ,
            //     'slug'         =>$this->slug ,
            // ]
        );
        session()->flash('Edit','Section updated successfully');
        return redirect()->route('admin.section');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-section-component')->layout('dashlayouts.master');
    }
}
