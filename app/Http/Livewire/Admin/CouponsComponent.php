<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class CouponsComponent extends Component
{
    public function delete($id){
        Coupon::destroy($id);
        session()->flash('Delete','Coupon deleteded successfully');
        return redirect()->route('admin.coupon');
     }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.coupons-component',compact('coupons'))->layout('dashlayouts.master');
    }
}
