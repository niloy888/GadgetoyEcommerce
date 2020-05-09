@extends('client.master')

@section('home-content')
    <section class="contact order-list">
        <div class="container page-bgc">
            <div class="card">
                <div class="card-header">
                    Invoice No
                    <strong>{{$order->id}}</strong>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h6 class="mb-3">Billed to:</h6>
                            <div>
                                <strong>{{Session::get('client_name')}}</strong>
                            </div>

                            <div>{{$order->full_address}}</div>
                            <div>{{$order->district}}, BANGLADESH</div>
                            <div>{{Session::get('client_email')}}</div>
                            <div>{{Session::get('client_contact_no')}}</div>
                        </div>





                    </div>

                    <div class="table-responsive-sm">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>Item</th>

                                <th class="right">Unit Cost</th>
                                <th class="center">Qty</th>
                                <th class="right">Unit * Quantity</th>
                                <th>Vendor Name</th>
                                <th>Contact No</th>
                                <th>Delivery Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td class="center">{{$i++}}</td>
                                    <td class="left strong">{{$invoice->product_name}}</td>

                                    <td class="right">{{$invoice->product_unit_price}}</td>
                                    <td class="center">{{$invoice->product_quantity}}</td>
                                    <td class="right">{{$invoice->unit_x_quantity_price}}</td>
                                    <td>{{$invoice->full_name}}</td>
                                    <td>{{$invoice->phone}}</td>

                                    <td class="right">
                                        @if($invoice->status==1 || $invoice->status==4)
                                            {{'Pending'}}
                                        @elseif($invoice->status==2)
                                            {{'Processing'}}
                                        @elseif($invoice->status==3)
                                            {{'Cancelled'}}
                                        @elseif($invoice->status==5)
                                            {{'Delivered'}}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">

                        </div>

                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">৳{{$order->sub_total}}</td>
                                </tr>
                                {{--<tr>
                                    <td class="left">
                                        <strong>Discount (20%)</strong>
                                    </td>
                                    <td class="right">৳1,699,40</td>
                                </tr>--}}
                                <tr>
                                    <td class="left">
                                        <strong>VAT (10%)</strong>
                                    </td>
                                    <td class="right">৳{{$order->vat}}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>৳{{$order->total_cost}}</strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!--</div>-->
    </section>
@endsection
