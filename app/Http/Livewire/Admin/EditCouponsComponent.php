<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class EditCouponsComponent extends Component
{

    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $coupon_id;

    public function mount($coupon_id){
        $coupon = Coupon::findorfail($coupon_id);
        $this->code         = $coupon->code ;
        $this->type         = $coupon->type;
        $this->value        = $coupon->value;
        $this->cart_value   = $coupon->cart_value;
        $this->coupon_id    = $coupon->id;
    }
    // real time validation----------------------------------------------------------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'code'        =>'required|unique:coupons,code,'.$this->coupon_id,
            'type'        =>'required|in:fixed,percent',
            'value'       =>'required|numeric',
            'cart_value'  =>'required|numeric',
        ]);
    }
 // end real time validation-
      public function update(){
        $validateData = $this->validate([
            'code'        =>'required|unique:coupons,code,'.$this->coupon_id,
            'type'        =>'required|in:fixed,percent',
            'value'       =>'required|numeric',
            'cart_value'  =>'required|numeric',
          ]);
        $coupon = Coupon::findorfail($this->coupon_id);
        $coupon->code       = $this->code;
        $coupon->type       = $this->type;
        $coupon->value      = $this->value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        // $coupon->update($validateData,
        //     [
        //         'code'        =>$this->code,
        //         'type'        =>$this->type ,
        //         'value'       =>$this->value ,
        //         'cart_value'  =>$this->cart_value ,
        //     ]
        // );
        session()->flash('Edit','Coupon updated successfully');
        return redirect()->route('admin.coupon');
    }
    public function render()
    {
        return view('livewire.admin.edit-coupons-component')->layout('dashlayouts.master');
    }
}
