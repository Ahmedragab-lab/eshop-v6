<?php

namespace App\Http\Livewire\User;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserOrderDetailsComponent extends Component
{
    public $order_id;

    public function mount($order_id){
       $this->order_id = $order_id;
    }
    public function cancelOrder($order_id){
        $order = Order::findorfail($order_id);
      $order->status = 'canceled';
      $order->canceled_date =  DB::raw('CURRENT_DATE');
      $order->update();
      session()->flash('order_message','Order has been canceled !!');
    //   return redirect()->route('user.order');
    }
    public function activeOrder($order_id){
      $order = Order::findorfail($order_id);
      $order->status = 'ordered';
      $order->canceled_date =  null;
      $order->created_at = date('Y-m-d');
      $order->update();
      session()->flash('order_message_success','Order has been activated Successfully ');
    //   return redirect()->route('user.order');
    }
    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-order-details-component',compact('order'))->layout('layouts.master');
    }
}
