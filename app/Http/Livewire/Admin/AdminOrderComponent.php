<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($order_id,$status){
      $order = Order::findorfail($order_id);
      $order->status = $status;
      if($status == 'delivered'){
          $order->deliverd_date = DB::raw('CURRENT_DATE');
      }elseif($status == 'canceled'){
          $order->canceled_date = DB::raw('CURRENT_DATE');
      }
      $order->update();
      session()->flash('order_message','Order Status has been updated !!');
    }
    public function render()
    {
        $orders = Order::latest()->get();
        return view('livewire.admin.admin-order-component',compact('orders'))->layout('dashlayouts.master');
    }
}
