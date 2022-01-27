<?php

namespace App\Http\Livewire;

use App\Models\Section;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuntity($rowID)
    {
      $product = Cart::instance('cart')->get($rowID);
      $qty = $product->qty +1;
      Cart::instance('cart')->update($rowID , $qty);
      $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuntity($rowID)
    {
      $product = Cart::instance('cart')->get($rowID);
      $qty = $product->qty -1;
      Cart::instance('cart')->update($rowID , $qty);
      $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowID)
    {
       Cart::instance('cart')->remove($rowID);
       $this->emitTo('cart-count-component','refreshComponent');
       session()->flash('success_message','Item has been removed');


    }
    public function destroyAll()
    {
       Cart::instance('cart')->destroy();
       $this->emitTo('cart-count-component','refreshComponent');
       session()->flash('success_message','All Item has been removed');

    }

    public function render()
    {
        return view('livewire.CartComponent')->layout('layouts.master');
    }
}
