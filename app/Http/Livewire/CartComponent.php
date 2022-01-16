<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuntity($rowID)
    {
      $product = Cart::get($rowID);
      $qty = $product->qty +1;
      Cart::update($rowID , $qty);
    }
    public function decreaseQuntity($rowID)
    {
      $product = Cart::get($rowID);
      $qty = $product->qty -1;
      Cart::update($rowID , $qty);
    }
    public function destroy($rowID)
    {
       Cart::remove($rowID);
       session()->flash('success_message','Item has been removed');

    }
    public function destroyAll()
    {
       Cart::destroy();
       session()->flash('success_message','All Item has been removed');

    }

    public function render()
    {
        return view('livewire.CartComponent')->layout('layouts.master');
    }
}
