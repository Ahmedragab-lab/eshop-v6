<!--div-->
<div class="col-xl-12">
    <div class="card mg-b-20">
        <div class="card-header pb-0">
            <div class="d-flex justify-content-between">
                <h4 class="card-title mg-b-0">Contact Us</h4>
                <i class="mdi mdi-dots-horizontal text-gray"></i>
            </div>
            @include('partial.error')
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table key-buttons text-md-nowrap">
                    <thead>
                        <tr>
                            <th class="border-bottom-0"> # </th>
                            <th class="border-bottom-0">Name</th>
                            <th class="border-bottom-0">email</th>
                            <th class="border-bottom-0">phone</th>
                            <th class="border-bottom-0">comment</th>
                            <th class="border-bottom-0">created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $index=>$contact)
                            <tr>
                                <th>{{ $index + 1 }}</th>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email}}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->comment}}</td>
                                <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

