<?php

namespace App\Http\Controllers\Vendor;

use App\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class OrderController extends Controller
{

    public function manageOrder(){

        $vid = Session::get('vendor_id');
        $orders = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->join('vendors', 'invoices.vendor_id', '=', 'vendors.id')
            ->select('invoices.*', 'clients.full_name', 'clients.contact_no','products.product_name','orders.full_address')
            ->where('invoices.vendor_id',"=",$vid)
            ->where('invoices.status',"!=",1)
            ->orderBy('invoices.id','desc')
            ->get();
        // $vid = Session::get('vendorid');
        // $vendor_orders = invoice::where('vendor_id',"=",$vid)->get();



        return view('vendor.order.manage-order',[
            'orders' => $orders,
            //  'vendor_orders' => $vendor_orders
        ]);

    }


    public function acceptOrder($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 2;
        $invoice->save();
        return back();
    }

    public function cancelOrder($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 3;
        $invoice->save();
        return back();
    }

    public function deliveredOrder($id)
    {
        $invoice = Invoice::find($id);
        $invoice->status = 5;
        $invoice->save();
        return back();
    }






}
