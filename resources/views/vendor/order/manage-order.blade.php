@extends ('vendor.master')


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
                        <th>No.</th>
                        <th>Customer Name</th>
                        <th>Phone No</th>
                        <th>Order ID</th>
                        <th>Product name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Delivery location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Customer Name</th>
                        <th>Phone No</th>
                        <th>Order ID</th>
                        <th>Product name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Delivery location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @php($i = 1)
                    @foreach ($orders as $order)
                        <tbody>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$order->full_name}}</td>
                            <td>{{$order->contact_no}}</td>
                            <td>{{$order->order_id}}</td>
                            <td>{{$order->product_name}}</td>
                            <td>{{$order->product_quantity}}</td>
                            <td>{{$order->product_unit_price}}</td>

                            <td>{{$order->created_at}}</td>
                            <td>{{$order->full_address}}</td>
                            @if($order->status == 4)
                                <td><span style="color:blue">Pending</span></td>
                            @elseif($order->status == 2)
                                <td><span style="color:orange"><b>Processing</b></span></td>
                            @elseif($order->status == 3)
                                <td><span style="color:red">Cancelled</span></td>
                            @elseif($order->status==5)
                                <td><span style="color:green">Delivered</span></td>
                            @endif
                            <td>
                                {{-- <a
                                    href=""
                                    class="btn btn-sm btn-info border-0" style="border-radius: 12px; margin-bottom:10px;  ">
                                    Details
                                </a> --}}
                                @if($order->status==4)
                                    <a
                                        href="{{route('vendor-order-accept',['id' => $order->id])}}"
                                        class="btn btn-info">
                                        Accept
                                    </a>
                                @endif
                                @if($order->status==2)
                                    <a
                                        href="{{route('vendor-order-delivered',['id' => $order->id])}}"
                                        class="btn btn-success">
                                        Delivered
                                    </a>
                                @endif

                                @if($order->status!=3 && $order->status!=5)
                                    <a
                                        href="{{route('vendor-order-cancel',['id' => $order->id])}}"
                                        class="mt-2 btn btn-danger">
                                        Cancel
                                    </a>
                                @endif
                            </td>
                        </tr>

                        </tbody>
                        @endforeach
                </table>
            </div>
        </div>
    </div>

    {{--</div>--}}
    <!-- /.container-fluid -->

@endsection
