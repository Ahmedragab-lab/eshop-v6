<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;
use Exception;
use Stripe;

class Checkout extends Component
{
    public $ship_to_different;

    public $fname;
    public $lname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;

    public $s_fname;
    public $s_lname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_zipcode;

    public $paymentmode;
    public $thankyou;

    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;




    // real time validation----------------------------------------------------------------------------
    public function updated($propertyName){
        $this->validateOnly($propertyName, [
            'fname'   =>'required',
            'lname'   =>'required',
            'email'   =>'required|email',
            'mobile'  =>'required|numeric',
            'line1'   =>'required',
            'city'    =>'required',
            'province'=>'required',
            'country' =>'required',
            'zipcode' =>'required',
            'paymentmode' =>'required'
        ]);
        if($this->ship_to_different){
            $this->validateOnly($propertyName, [
                's_fname'   =>'required',
                's_lname'   =>'required',
                's_email'   =>'required|email',
                's_mobile'  =>'required|numeric',
                's_line1'   =>'required',
                's_city'    =>'required',
                's_province'=>'required',
                's_country' =>'required',
                's_zipcode' =>'required'
               ]);
        }
        if($this->paymentmode == 'card'){
            $this->validateOnly($propertyName, [
                'card_no'   =>'required|numeric',
                'exp_month' =>'required|numeric',
                'exp_year'  =>'required|numeric',
                'cvc'       =>'required|numeric',

               ]);
        }
    }
     // end real time validation-
    public function placeOrder(){
       $this->validate([
        'fname'   =>'required',
        'lname'   =>'required',
        'email'   =>'required|email',
        'mobile'  =>'required|numeric',
        'line1'   =>'required',
        'city'    =>'required',
        'province'=>'required',
        'country' =>'required',
        'zipcode' =>'required',
        'paymentmode' =>'required'
       ]);
       if($this->paymentmode == 'card'){
        $this->validate([
            'card_no'   =>'required|numeric',
            'exp_month' =>'required|numeric',
            'exp_year'  =>'required|numeric',
            'cvc'       =>'required|numeric',
           ]);
       }
       $order = new Order();
       $order->user_id                = Auth::user()->id;
       $order->subtotal               = session()->get('checkout')['subtotal'];
       $order->discount               = session()->get('checkout')['discount'];
       $order->tax                    = session()->get('checkout')['tax'];
       $order->total                  = session()->get('checkout')['total'];
       $order->firstname              = $this->fname;
       $order->lastname               = $this->lname;
       $order->mobile                 = $this->mobile;
       $order->email                  = $this->email;
       $order->line1                  = $this->line1;
       $order->line2                  = $this->line2;
       $order->city                   = $this->city;
       $order->province               = $this->province;
       $order->country                = $this->country;
       $order->zipcode                = $this->zipcode;
       $order->status                 = 'ordered';
       $order->is_shipping_different  = $this->ship_to_different ? 1:0;
       $order->save();
       foreach(Cart::instance('cart')->content() as $item){
          $orderitem = new OrderItem();
          $orderitem->product_id    = $item->id;
          $orderitem->order_id      = $order->id;
          $orderitem->price         = $item->price;
          $orderitem->qty           = $item->qty;
          $orderitem->save();
       }

       if($this->ship_to_different ){
        $this->validate([
            's_fname'   =>'required',
            's_lname'   =>'required',
            's_email'   =>'required|email',
            's_mobile'  =>'required|numeric',
            's_line1'   =>'required',
            's_city'    =>'required',
            's_province'=>'required',
            's_country' =>'required',
            's_zipcode' =>'required'
           ]);
        $shipping = new Shipping();
        $shipping->order_id               = $order->id;
        $shipping->firstname              = $this->s_fname;
        $shipping->lastname               = $this->s_lname;
        $shipping->mobile                 = $this->s_mobile;
        $shipping->email                  = $this->s_email;
        $shipping->line1                  = $this->s_line1;
        $shipping->line2                  = $this->s_line2;
        $shipping->city                   = $this->s_city;
        $shipping->province               = $this->s_province;
        $shipping->country                = $this->s_country;
        $shipping->zipcode                = $this->s_zipcode;
        $shipping->save();
       }
       if($this->paymentmode =='cod'){
            $this->makeTransaction($order->id,'pending');
            $this->resetCart();
        }elseif($this->paymentmode =='card'){
           $stripe = Stripe::make(env('STRIP_KEY'));
           try{
               $token = $stripe->tokens()->create(
               [
                  'card'=>
                  [
                    'number'    =>$this->card_no,
                    'exp_month' =>$this->exp_month,
                    'exp_year'  =>$this->exp_year,
                    'cvc'       =>$this->cvc,
                  ]
               ]);
               if(!isset($token['id'])){
                  session()->flash('stripe_error','this stripe token was not generated correctly!!');
                  $this->thankyou = 0 ;
               }
               $customer = $stripe->customers()->create([
                   'name'=>$this->fname .' '. $this->lname,
                   'email'=>$this->email,
                   'phone'=>$this->mobile,
                   'address'=> [
                      'line1'       =>$this->line1,
                      'postal_code' =>$this->zipcode,
                      'city'        =>$this->city,
                      'state'       =>$this->province,
                      'country'     =>$this->country,
                   ],
                   'shipping'=>[
                    'name'=>$this->fname .' '. $this->lname,
                    'address'=> [
                        'line1'       =>$this->line1,
                        'postal_code' =>$this->zipcode,
                        'city'        =>$this->city,
                        'state'       =>$this->province,
                        'country'     =>$this->country,
                     ],
                    ],
                    'source'=>$token['id']   // foreign key نفس فكره فى الداتابيز
               ]);

               $charge = $stripe->charges()->create([
                'customer'     =>$customer['id'],
                'currency'     =>'USD',
                'amount'       =>session()->get('checkout')['total'],
                'description'  =>'payment for order no' . $order->id,
               ]);
               if($charge['status'] == 'succeeded'){
                    $this->makeTransaction($order->id,'approved');
                    $this->resetCart();
               }else{
                    session()->flash('stripe_error','Error in transaction!!');
                    $this->thankyou = 0 ;
               }
           }catch(Exception $e){
                session()->flash('stripe_error',$e->getMessage());
                $this->thankyou = 0 ;
           }
        }
    }

    public function makeTransaction($order_id,$status){
        $transaction            = new Transaction();
        $transaction->user_id   = Auth::user()->id;
        $transaction->order_id  = $order_id;
        $transaction->mode      = $this->paymentmode;
        $transaction->status    = $status;
        $transaction->save();
    }


    public function resetCart(){
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout(){
       if(!Auth::check()){
           return redirect()->route('login');
       }elseif($this->thankyou){
           return redirect()->route('thankyou');
       }elseif(!session()->get('checkout')){
           return redirect()->route('product.cart');
       }
    }

    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout')->layout('layouts.master');
    }
}
