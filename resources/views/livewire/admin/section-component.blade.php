<!--div-->
<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Bordered Table</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            <p class="tx-12 tx-gray-500 mb-2">Example of Valex Bordered Table.. <a href="">Learn more</a></p>
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
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $section->section_name }}</td>
                                <td>{{ $section->slug }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-warning btn-sm" title="Edit"><i class="fa fa-trash"></i></button>
                                </td>
                                <td>{{ $section->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--/div-->
