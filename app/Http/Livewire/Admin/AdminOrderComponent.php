<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function render()
    {
        $orders = Order::latest()->get();
        return view('livewire.admin.admin-order-component',compact('orders'))->layout('dashlayouts.master');
    }
}
