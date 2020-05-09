<?php

namespace App\Http\Controllers\Client;

use App\Invoice;
use App\Order;
use App\Payment;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Cart;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        $order = new Order();
        $order->client_id = Session::get('client_id');

        $order->full_address = $request->fullAddress;
        $order->city = $request->city;
        $order->district = $request->district;
        $order->sub_total = Session::get('subTotal');
        $order->vat = Session::get('vat');
        $order->total_cost = Session::get('totalCost');
        $order->save();


        $payment = new Payment();
        $payment->order_id = $order->id;
        $payment->client_id = Session::get('client_id');
        $payment->payment_method = $request->paymentMethod;
        $payment->name_on_card = $request->nameOnCard;
        $payment->card_number = $request->cardNumber;
        $payment->expire_date = $request->expireDate;
        $payment->security_number = $request->securityNumber;
        $payment->comment = $request->comment;
        $payment->save();


        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->id);


            $product->increment("popularity");

            $invoice = new Invoice();
            $invoice->order_id = $order->id;
            $invoice->client_id = Session::get('client_id');
            $invoice->vendor_id = $product->vendor->id;
            $invoice->payment_id = $payment->id;
            $invoice->product_id = $cartItem->id;
            $invoice->product_unit_price = $cartItem->price;
            $invoice->product_quantity = $cartItem->qty;
            $invoice->unit_x_quantity_price = $cartItem->price * $cartItem->qty;
            $invoice->save();
        }


        $order->payment_id = $payment->id;
        $order->save();

        Cart::destroy();

        return redirect('/')->with('message', 'Order received successfully. Check your order list');
        // return $request->all();
        //    return redirect('/');
    }

}
