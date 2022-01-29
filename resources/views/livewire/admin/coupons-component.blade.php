<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Coupon</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <a href="{{ route('admin.addcoupon') }}" class="btn btn-primary ">Add New Coupon</a>
            @include('partial.error')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0"> # </th>
                            <th class="border-bottom-0">Coupon Code</th>
                            <th class="border-bottom-0">Coupon Type</th>
                            <th class="border-bottom-0">Coupon Value</th>
                            <th class="border-bottom-0">Cart Value</th>
                            <th class="border-bottom-0">Action</th>
                            <th class="border-bottom-0">created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $index=>$coupon)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $coupon->code }}</td>
                                <td class="{{ $coupon->type == 'fixed' ? 'text-success':'text-primary'}}">
                                    {{ $coupon->type == 'fixed' ? 'fixed':'percent'}}
                                </td>
                                @if ( $coupon->type == 'fixed')
                                   <td>${{ $coupon->value }}</td>
                                @else
                                   <td>{{ $coupon->value }}%</td>
                                @endif
                                <td>{{ $coupon->cart_value }}</td>
                                <td>
                                    <a href="{{ route('admin.editcoupon',$coupon->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" title="Delete"
                                               wire:click.prevent="delete({{ $coupon->id }})"
                                               onclick="confirm('{{ __('Are you sure to delete this coupon') }}') || event.stopImmediatePropagation() ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>{{ $coupon->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
