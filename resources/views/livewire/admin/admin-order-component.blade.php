<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Orders</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            {{-- <a href="{{ route('admin.addproduct') }}" class="btn btn-primary ">Add New Product</a> --}}
            @include('partial.error')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0"> # </th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">Subtotal</th>
                            <th class="border-bottom-0">Discount</th>
                            <th class="border-bottom-0">Tax</th>
                            <th class="border-bottom-0">Total</th>
                            <th class="border-bottom-0">Mobile</th>
                            <th class="border-bottom-0">Email</th>
                            <th class="border-bottom-0">Zipcode</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">Action</th>
                            <th class="border-bottom-0">Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $index=>$order)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <th>{{ $order->firstname .' '. $order->lastname }}</th>
                                <th>${{ $order->subtotal}}</th>
                                <th>${{ $order->discount}}</th>
                                <th>${{ $order->tax}}</th>
                                <th>${{ $order->total}}</th>
                                <th>{{ $order->mobile}}</th>
                                <th>{{ $order->email}}</th>
                                <th>{{ $order->zipcode}}</th>
                                <th>{{ $order->status}}</th>
                                <td>
                                    <a href="{{ route('admin.orderdetails',$order->id) }}" class="btn btn-info btn-sm" title="Details">
                                        Details
                                    </a>
                                </td>
                                <td>{{ $order->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


