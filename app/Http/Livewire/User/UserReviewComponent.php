<?php

namespace App\Http\Livewire\User;

use App\Models\OrderItem;
use App\Models\Review;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $order_item_id;
    public $rating;
    public $comment;

    public function mount($order_item_id){
        $this->order_item_id =$order_item_id;
    }

    // real time validation----------------------------------------------------------------------------
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'rating'  =>'required',
            'comment' =>'required',
        ]);
    }
    // end real time validation-

    public function addreview(){
        $this->validate([
          'rating'  =>'required',
          'comment' =>'required',
        ]);
    //    $review = new Review();
    //    $review->order_item_id = $this->order_item_id;
    //    $review->rating        = $this->rating;
    //    $review->comment       = $this->comment;
    //    $review->save();
    //    $orderitem = OrderItem::findorfail($this->order_item_id);
    //    $orderitem->rstatus = true;
    //    $orderitem->update();
    $review = Review::create([
        'order_item_id'=> $this->order_item_id,
        'rating'       => $this->rating,
        'comment'      => $this->comment,
    ]);
    $orderitem = OrderItem::findorfail($this->order_item_id);
    $orderitem->update([
        'rstatus' => true,
    ]);


       session()->flash('message','your review has been added successfully');
    //    return redirect()->route('user.order');
    }
    public function render()
    {
        $orderitem = OrderItem::findorfail($this->order_item_id);
        return view('livewire.user.user-review-component',compact('orderitem'))->layout('layouts.master');
    }
}
