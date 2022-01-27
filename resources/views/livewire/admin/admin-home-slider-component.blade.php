<!--div-->
<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Home Slider</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <a href="{{ route('admin.addhomeslider') }}" class="btn btn-primary ">Add New Home Slider</a>
            @include('partial.error')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0"> # </th>
                            <th class="border-bottom-0">Title</th>
                            <th class="border-bottom-0">Subtitle</th>
                            <th class="border-bottom-0">Price</th>
                            <th class="border-bottom-0">Link</th>
                            <th class="border-bottom-0">Image</th>
                            <th class="border-bottom-0">Status</th>
                            <th class="border-bottom-0">action</th>
                            <th class="border-bottom-0">created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $index=>$slider)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->subtitle }}</td>
                                <td>{{ number_format($slider->price) }}</td>
                                <td>{{ $slider->link }}</td>
                                <td>
                                    <img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" width="60" class="img-thumbnail">
                                </td>
                                <td class="{{ $slider->status == 1 ? 'text-success':'text-danger'}}">
                                    {{ $slider->status ==1 ? 'Active':'Inactive'}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.edithomeslider',$slider->id) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm" title="Delete"
                                               wire:click.prevent="delete({{ $slider->id }})"
                                               onclick="confirm('{{ __('Are you sure to delete this homeslider') }}') || event.stopImmediatePropagation() ">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>{{ $slider->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/div-->
