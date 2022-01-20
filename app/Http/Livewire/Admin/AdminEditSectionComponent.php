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
        $this->section_id = $section->id;
        $this->section_name = $section->section_name;
        $this->slug = $section->slug;
    }

    public function generateslug(){
        $this->slug = Str::slug($this->section_name);
     }

      public function update(){
        $validateData = $this->validate([
            'section_name'=>'required',
            // 'section_name'=>'required|unique:table,column,except',$this->section_name,
            'slug'        =>'required|unique:sections',
          ]);
        $section = Section::findorfail($this->section_id);
        $section->update([
            'section_name' =>$this->section_name ,
            'slug'         =>$this->slug ,
        ]);

        // Section::create($validateData);
        session()->flash('Edit','Section updated successfully');
        return redirect()->route('admin.section');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-section-component')->layout('dashlayouts.master');
    }
}
