<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Products</h4>
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
                            <th class="border-bottom-0">Image</th>
                            <th class="border-bottom-0">Product Name</th>
                            <th class="border-bottom-0">Stock</th>
                            <th class="border-bottom-0">Price</th>
                            <th class="border-bottom-0">Section</th>
                            <th class="border-bottom-0">action</th>
                            <th class="border-bottom-0">created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $index=>$product)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>
                                    <img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="60" class="img-thumbnail">
                                </td>
                                <td>{{ $product->product_name }}</td>
                                <td class="{{ $product->stock == 'instock' ? 'text-success':'text-danger'}}">{{ $product->stock }}</td>
                                <td>{{ number_format($product->original_price,2) }}</td>
                                <td>{{ $product->section->section_name }}</td>
                                <td>
                                    <a href="{{ route('admin.editsection',$product->slug) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" title="Delete" wire:click.prevent="delete({{ $product->id }})"><i class="fa fa-trash"></i></a>
                                </td>
                                <td>{{ $product->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

