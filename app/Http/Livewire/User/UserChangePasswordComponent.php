<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserChangePasswordComponent extends Component
{
    public $current_password;
    public $password;
    public $confirm_password;


    public function updated($fields){
        $this->validateOnly($fields,[
            'current_password'  =>'required',
            // 'password'          =>'min:8|different:current_password|required_with:confirm_password|same:confirm_password',
            // 'password' => 'min:9|required_with:confirm_password|same:password_confirmation',
            // 'password' => 'min:8|required_with:confirm_password|same:confirm_password',
            // 'confirm_password' => 'min:8'
            'password'          =>'required|min:8|different:current_password',
            'confirm_password'  => 'required|min:8|same:password'
         ]);
    }
    public function changePassword(){
       $this->validate([
          'current_password'  =>'required',
        //   'password'          =>'required|min:8|confirmed|different:current_password',
        //   'password'          =>'required|min:8|different:current_password',
        'password'          => 'required|min:8|different:current_password',
        'confirm_password'  => 'required|min:8|same:password'
       ]);
       if(Hash::check($this->current_password , Auth::user()->password)){
          $user = User::findOrFail(Auth::user()->id);
          $user->password = Hash::make($this->password);
          $user->save();
          session()->flash('password_message','Password has been updated successfully');
       }else{
          session()->flash('password_error','Password does not match');
       }
    }
    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.master');
    }
}
