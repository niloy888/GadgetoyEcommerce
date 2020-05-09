<?php

namespace App\Http\Controllers\Admin;

use App\Invoice;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderController extends Controller
{

    public function manageOrders()
    {

        $orders = DB::table('orders')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->select('orders.*', 'clients.full_name', 'clients.contact_no')
            ->orderBy('id', 'desc')
            // ->where('invoice.vendor_id',"=",$vid)
            ->get();

        return view('admin.order.manage-order', [
            'orders' => $orders
        ]);
    }


    public function orderDetails($id){
        $orders = DB::table('invoices')
            ->join('orders', 'invoices.order_id', '=', 'orders.id')
            ->join('clients', 'orders.client_id', '=', 'clients.id')
            ->join('products', 'invoices.product_id', '=', 'products.id')
            ->join('vendors', 'invoices.vendor_id', '=', 'vendors.id')
            ->select('invoices.*', 'clients.full_name','products.product_name','vendors.full_name','vendors.phone')
            ->where('invoices.order_id',$id)
            ->get();


        return view('admin.order.order-details',[
            'orders' => $orders
        ]);
    }

    public function acceptOrder($id){

        $invoice = Invoice::find($id);
        $invoice->status = 4;
        $invoice->save();
        return back()->with('message','Order accepted successfully');
    }

    public function deleteSingleOrder($id){

        $invoice = Invoice::find($id);
        $invoice->delete();
        return back()->with('message','Order deleted successfully');
    }

    public function deleteOrder($id){

        $orders = Order::find($id);
        $orders->delete();

        $invoice = Invoice::where('order_id',$id);
        $invoice->delete();
        return back()->with('message','Order deleted successfully');
    }

}
