<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class AddCouponsComponent extends Component
{
    public $code;
    public $type;
    public $value;
    public $cart_value;
  // real time validation----------------------------------------------------------------------------
  public function updated($propertyName)
  {
      $this->validateOnly($propertyName, [
        'code'        =>'required|unique:coupons,code',
        'type'        =>'required|in:fixed,percent',
        'value'       =>'required|numeric',
        'cart_value'  =>'required|numeric',
      ]);
  }
// end real time validation-
    public function store(){
        try {
            $this->validate([
                'code'        =>'required|unique:coupons,code',
                'type'        =>'required|in:fixed,percent',
                'value'       =>'required|numeric',
                'cart_value'  =>'required|numeric',
            ]);
            $coupon = new Coupon();
            $coupon->code = $this->code;
            $coupon->type = $this->type;
            $coupon->value = $this->value;
            $coupon->cart_value = $this->cart_value;
            $coupon->save();
            session()->flash('Add','Coupon added successfully');
            return redirect()->route('admin.coupon');
        }catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }
    public function render()
    {
        return view('livewire.admin.add-coupons-component')->layout('dashlayouts.master');
    }
}
