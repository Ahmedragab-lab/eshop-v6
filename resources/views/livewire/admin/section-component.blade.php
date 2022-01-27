<!--div-->
<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Sections</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <a href="{{ route('admin.addsection') }}" class="btn btn-primary ">Add New Sections</a>
            {{-- <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                <a class="modal-effect btn btn-outline-primary btn-block mt-3" data-effect="effect-newspaper" data-toggle="modal"
                     href="#modaldemo8">
                     Add new Section
                </a>
            </div> --}}
            @include('partial.error')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0"> # </th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">slug</th>
                            <th class="border-bottom-0">action</th>
                            <th class="border-bottom-0">created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sections as $index=>$section)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $section->section_name }}</td>
                                <td>{{ $section->slug }}</td>
                                <td>
                                    <a href="{{ route('admin.editsection',$section->slug) }}" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"
                                               title="Delete"
                                               wire:click.prevent="delete({{ $section->id }})"
                                               {{-- onclick="confirm('{{ __('Are you sure to delete this section') }}') ? this.parentElement.submit() : ''" --}}
                                               onclick="confirm('{{ __('Are you sure to delete this section') }}') || event.stopImmediatePropagation() "
                                               >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                                <td>{{ $section->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal effects -->
		{{-- <div wire:ignore.self class="modal" id="modaldemo8">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Add New Section</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
					</div>
                    <form   wire:submit.prevent="store()" autocomplete="off" >
					  <div class="modal-body">
                        <div class="form-group col-md-6">
                                <label class="form-label">Section Name</label>
                                <input type="text"
                                        name="section_name" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="Section Name"
                                        wire:model='section_name'
                                        wire:keyup='generateslug'
                                        >
                                @error('section_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Slug</label>
                                <input type="text" name="slug" class="form-control @error('name') is-invalid @enderror  required"
                                        placeholder="Slug" wire:model='slug'>
                                @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit"  >Save changes</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
				</div>
			</div>
		</div> --}}
		<!-- End Modal effects-->
</div>
<!--/div-->
