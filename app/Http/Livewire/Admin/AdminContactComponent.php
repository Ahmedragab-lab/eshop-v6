<?php

namespace App\Http\Livewire\Admin;

use App\Models\Contact;
use Livewire\Component;

class AdminContactComponent extends Component
{
    public function render()
    {
        $contacts = Contact::orderByDesc('created_at')->get();
        return view('livewire.admin.admin-contact-component',compact('contacts'))->layout('dashlayouts.master');
    }
}
