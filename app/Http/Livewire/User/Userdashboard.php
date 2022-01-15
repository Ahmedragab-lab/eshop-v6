<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Userdashboard extends Component
{
    public function render()
    {
        return view('livewire.user.userdashboard')->layout('layouts.master');
    }
}
