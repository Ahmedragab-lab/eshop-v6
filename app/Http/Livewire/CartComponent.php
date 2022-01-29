<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use App\Models\Section;
use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public $havecoupon_code;
    public $couponcode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;
    // public $couponcode;

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
    public function SaveForLater($rowId)
    {
       $item = Cart::instance('cart')->get($rowId);
       Cart::instance('cart')->remove($rowId);
       Cart::instance('saveforlater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
       $this->emitTo('cart-count-component','refreshComponent');
       session()->flash('success_message','Item has been saved for later');
    }

    public function moveProductFromSaveForLaterToCart($rowId)
    {
        $item = Cart::instance('saveforlater')->get($rowId);
        Cart::instance('saveforlater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','item has been moved to cart successfully');
    }
    public function DeleteFromSaveForLater($rowId)
    {
        Cart::instance('saveforlater')->remove($rowId);
        session()->flash('s_success_message','Item has been removed from saved for later');
    }
    public function applyCouponCode()
    {
       $coupon = Coupon::where('code',$this->couponcode)
                //  ->where('cart_value',' <= ', Cart::instance('cart')->subtotal())
                 ->first();
        if(!$coupon){
            session()->flash('coupon_message','coupon code is invalid !!');
            return;
        }
        session()->put('coupon',[
            'code'      =>$coupon->code,
            'type'      =>$coupon->type,
            'value'     =>$coupon->value,
            'cart_value'=>$coupon->cart_value,
        ]);
    }
    public function calculateDiscounts(){
        if(session()->has('coupon')){
             if(session()->get('coupon')['type']=='fixed'){
                 $this->discount = session()->get('coupon')['value'];
             }else{
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['value'])/100;
             }
             $this->subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $this->discount;
             $this->taxAfterDiscount      = ($this->subtotalAfterDiscount *  config('cart.tax'))/100 ;
             $this->totalAfterDiscount    = $this->subtotalAfterDiscount + $this->taxAfterDiscount;
        }
    }

    public function removeCoupon(){
        session()->forget('coupon');
    }
    public function render()
    {
        if(session()->has('coupon')){
          if( Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
               session()->forget('coupon');
          }else{
              $this->calculateDiscounts();
          }
        }
        return view('livewire.CartComponent')->layout('layouts.master');
    }
}
