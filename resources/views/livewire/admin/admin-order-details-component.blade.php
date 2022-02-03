
  <!-- row opened -->
  <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><strong style="color: rgb(224, 33, 33);">{{ $order->firstname }} {{ $order->lastname }}</strong> Order No {{ $order->id }} Details</h3>
                <a href="{{ route('admin.order') }}" class="btn btn-primary ">All Orders</a>
            </div>
            <div class="card-body">
                <div id="accordion" class="w-100 br-2 overflow-hidden">
                    <div class="">
                        <div class="accor bg-primary" id="headingOne1">
                            <h4 class="m-0">
                                <a href="#collapseOne1" class="" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                   <i class="si si-cursor-move mr-2"></i>Order Items
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="border p-3">
                                <table class="table mb-0 table-bordered border-top mb-0">
                                    <thead>
                                      <tr>
                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Slug</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
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
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4>Order Summary</h4>
                                <div> Subtotal = ${{ $order->subtotal }} </div>
                                <div> Tax      = ${{ $order->tax }} </div>
                                <div> Shipping = Free Shipping </div>
                                <div> Total    = ${{ $order->total }} </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="accor  bg-primary" id="headingTwo2">
                            <h4 class="m-0">
                                <a href="#collapseTwo2" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="si si-cursor-move mr-2"></i>Billing Info
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo2" class="collapse b-b0" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="border p-3">
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
                    </div>
                    @if($order->is_shipping_different == 1)
                        <div class="">
                            <div class="accor  bg-primary" id="headingThree3">
                                <h4 class="m-0">
                                    <a href="#collapseThree1" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="si si-cursor-move mr-2"></i>Shipping Info
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree1" class="collapse b-b0" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="border p-3">
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
                            </div>
                        </div>
                    @endif

                    <div class="">
                        <div class="accor  bg-primary" id="headingThree3">
                            <h4 class="m-0">
                                <a href="#collapseThree1" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="si si-cursor-move mr-2"></i>Transaction Info
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree1" class="collapse b-b0" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="border p-3">
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
        </div>
    </div>
</div>
<!-- row closed -->

