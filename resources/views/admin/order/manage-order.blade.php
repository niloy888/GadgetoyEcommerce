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
            <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Order ID</th>
                        <th>Total Cost</th>
                        <th>Shipping Address</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Customer Name</th>
                        <th>Contact No</th>
                        <th>Order ID</th>
                        <th>Total Cost</th>
                        <th>Shipping Address</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i=1)
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->full_name}}</td>
                            <td>{{$order->contact_no}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->total_cost}}</td>
                            <td>{{$order->full_address}}</td>
                            <td>
                                <a href="{{route('admin-manage-order-details',['id'=>$order->id])}}"
                                   class="btn btn-info">
                                    Details
                                </a>
                                <a
                                    href="{{route('admin-delete-order',['id'=>$order->id])}}"
                                    class="ml-1 btn btn-danger">
                                    Delete
                                </a>

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
