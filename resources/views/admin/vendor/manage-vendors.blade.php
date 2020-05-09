@extends ('admin.master')


@section('body')

    <!-- Begin Page Content -->
    {{--<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tables</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vendors</h6>
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Vendor Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Location</th>
                        <th>NID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Vendor Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Location</th>
                        <th>NID</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($vendors as $vendor)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$vendor->full_name}}</td>
                            <td>{{$vendor->email}}</td>
                            <td>{{$vendor->phone}}</td>
                            <td>{{$vendor->city}}</td>
                            <td>{{$vendor->location}}</td>
                            <td>{{$vendor->nid}}</td>
                            <td>{{$vendor->activity == 1 ? 'Active' : 'Pending'}}</td>
                            <td>
                                @if($vendor->activity == 1)
                                    <a href="{{route('cancel-vendor',['id'=>$vendor->id])}}" class="btn btn-info btn-xs">
                                        <span class="fa fa-arrow-up"></span>
                                    </a>
                                @else
                                    <a href="{{route('accept-vendor',['id'=>$vendor->id])}}" class="btn btn-warning btn-xs">
                                        <span class="fa fa-arrow-down"></span>
                                    </a>
                                @endif

                                <a href="#"  class="btn btn-danger btn-xs"
                                   onclick="event.preventDefault();
                                       var check = confirm('Are you sure you want to delete?');
                                       if(check){
                                       document.getElementById('deleteBrandForm'+'{{$vendor->id}}').submit();
                                       }" >
                                    <span class="fa fa-trash"></span>
                                </a>
                                <form id="deleteBrandForm{{$vendor->id}}" action="{{route('delete-vendor')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$vendor->id}}">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{--</div>--}}
    <!-- /.container-fluid -->

@endsection
