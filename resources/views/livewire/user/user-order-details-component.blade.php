<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default " style="margin: 10px;">
                <div class="panel-heading">
                    <a href="{{ route('user.order') }}" class="btn btn-success btn-sm pull-right">My Orders</a>
                   <h4>Order Details Of {{ $order->firstname }} {{ $order->lastname }} No <span style="color: red;">{{ $order->id }}</span></h4>
                   @if($order->status == 'ordered')
                   <a href="" class="btn btn-warning btn-sm " wire:click.prevent='cancelOrder({{ $order->id }})'>Cancel Order</a>
                   @elseif($order->status == 'canceled')
                   <a href="" class="btn btn-success btn-sm " wire:click.prevent='activeOrder({{ $order->id }})'>Active Order</a>
                   @endif
                </div>
                @if (session()->has('order_message'))
                    <div class="alert alert-warning " role="alert">
                        <strong style="padding-right: 35px;">{{ session()->get('order_message') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                 @endif
                @if (session()->has('order_message_success'))
                    <div class="alert alert-success " role="alert">
                        <strong style="padding-right: 35px;">{{ session()->get('order_message_success') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                 @endif
                <div class="panel-body">
                    <table class="table mb-0 table-bordered border-top mb-0">
                        <thead>
                          <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Review</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                                <tr>
                                <td>
                                    <img src="{{ asset('assets/images/products') }}/{{ $item->product->image }}" width="60" class="img-thumbnail">
                                </td>
                                <td>{{ $item->product->product_name }}</td>
                                <td>{{ $item->product->slug }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>$ {{ number_format( $item->price * $item->qty ,2) }}</td>
                                @if($order->status == 'delivered' && $item->rstatus == false)
                                   <td><a href="{{ route('user.review',$item->id ) }}" class="btn btn-info btn-sm">write review</a></td>
                                @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>Order Summary</h4>
                    <table class="table mb-0 table-bordered border-top mb-0">
                        <tr>
                            <th>Subtotal</th>
                            <td>${{ $order->subtotal }}</td>
                        </tr>
                        <tr>
                            <th>Tax </th>
                            <td>${{ $order->tax }}</td>
                        </tr>
                        <tr>
                            <th>Shipping</th>
                            <td>Free Shipping </td>
                        </tr>
                        <tr>
                            <th>Total </th>
                            <td>${{ $order->total }} </td>
                        </tr>
                        <tr>
                            <th>Order Date</th>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>{{ $order->status }}</td>
                        </tr>
                        @if( $order->status == 'delivered')
                            <tr>
                                <th>Delivery Date</th>
                                <td>{{ $order->deliverd_date }}</td>
                            </tr>
                        @elseif(( $order->status == 'canceled'))
                            <tr>
                                <th>Canceled Date</th>
                                <td>{{ $order->canceled_date }}</td>
                            </tr>
                        @elseif(( $order->status == 'ordered'))
                            <tr>
                                <th>order Date</th>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
            <div class="panel panel-default" style="margin: 10px;">
                <div class="panel-heading">
                   <h4>Order Billing</h4>
                </div>
                <div class="panel-body">
                    <table class="table mb-0 table-bordered border-top mb-0">
                        <thead>
                          <tr>
                            <th>Client Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Line 1</th>
                            <th>Line 2</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Zipcode</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>{{ $order->firstname }} {{ $order->lastname }}</td>
                            <td>{{ $order->mobile }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->line1 }}</td>
                            <td>{{ $order->line2 }}</td>
                            <td>{{ $order->province }}</td>
                            <td>{{ $order->city }}</td>
                            <td>{{ $order->country }}</td>
                            <td>{{ $order->zipcode }}</td>
                          </tr>

                        </tbody>
                    </table>
                </div>
            </div>
                @if($order->is_shipping_different == 1)
                    <div class="panel panel-default" style="margin: 10px;">
                        <div class="panel-heading">
                        <h4>Shipping info</h4>
                        </div>
                        <table class="table mb-0 table-bordered border-top mb-0">
                            <thead>
                                <tr>
                                <th>Client Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Line 1</th>
                                <th>Line 2</th>
                                <th>Province</th>
                                <th>City</th>
                                <th>Country</th>
                                <th>Zipcode</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <td>{{ $order->shipping->firstname }} {{ $order->shipping->lastname }}</td>
                                <td>{{ $order->shipping->mobile }}</td>
                                <td>{{ $order->shipping->email }}</td>
                                <td>{{ $order->shipping->line1 }}</td>
                                <td>{{ $order->shipping->line2 }}</td>
                                <td>{{ $order->shipping->province }}</td>
                                <td>{{ $order->shipping->city }}</td>
                                <td>{{ $order->shipping->country }}</td>
                                <td>{{ $order->shipping->zipcode }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endif
            <div class="panel panel-default" style="margin: 10px;">
                <div class="panel-heading">
                    <h4>Transaction Info</h4>
                </div>
                <div class="panel-body">
                    <table class="table mb-0 table-bordered border-top mb-0">
                        <tr>
                            <th>Transaction Mode</th>
                            <td>{{ $order->transaction->mode }}</td>
                        </tr>
                        <tr>
                            <th>Transaction Status</th>
                            <td>{{ $order->transaction->status }}</td>
                        </tr>
                        <tr>
                            <th>Transaction Date</th>
                            <td>{{ $order->transaction->created_at->format('Y-m-d') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

