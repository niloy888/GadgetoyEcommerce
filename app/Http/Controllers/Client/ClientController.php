<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class ClientController extends Controller
{
    public function login()
    {
        return view('client.login.login');

    }

    public function loginProcess(Request $request)
    {
        $client = Client::where('email', $request->email)->first();
        if ($client) {
            if (password_verify($request->password, $client->password)) {
                Session::put('client_id', $client->id);
                Session::put('client_name', $client->full_name);
                Session::put('client_email', $client->email);
                Session::put('client_contact_no', $client->contact_no);

                return redirect('/');
            } else {
                return redirect('client-login')->with('message', 'Wrong Password!!');
            }
        } else {
            return redirect('client-login')->with('message', 'Invalid email!!');
        }

    }


    public function register()
    {
        return view('client.register.register');

    }

    public function registerProcess(Request $request)
    {

        $client = new Client();
        $client->full_name = $request->full_name;
        $client->email = $request->email;
        $client->password = bcrypt($request->password);
        $client->contact_no = $request->contact_no;
        $client->save();

        Session::put('client_id', $client->id);
        Session::put('client_name', $client->full_name);
        Session::put('client_email', $client->email);
        Session::put('client_contact_no', $client->contact_no);

        return redirect('/');
    }

    public function logout()
    {

        Session::forget('client_id');
        Session::forget('client_name');
        Session::forget('client_email');
        Session::forget('client_contact_no');

        return redirect('/');

    }

    public function editProfile()
    {
        return view('client.profile.edit-profile');
    }

    public function updateProfile(Request $request){

        $client = Client::find($request->id);
        $client->full_name         = $request->full_name;
        $client->contact_no        = $request->contact_no;
        $client->present_address   = $request->present_address;
        $client->permanent_address = $request->permanent_address;
        $client->nid               = $request->nid;

        $client->save();


        Session::put('client_nid',$client->nid);
        Session::put('client_present_address',$client->present_address);
        Session::put('client_permanent_address',$client->permanent_address);


        return redirect('/client/profile')->with('message','Profile updated successfully!!');
    }

    public function orderList(){
        $uid = Session::get('client_id');
        $orders = DB::table('orders')

            ->join('clients','clients.id','=','orders.client_id')
            ->join('payments','orders.id','=','payments.order_id')
            ->where('orders.client_id',$uid)
            ->select('clients.*','orders.*','payments.payment_method')
            ->orderBy('orders.id','desc')
            ->get();
        return view('client.profile.order-list',[
            'orders'=>$orders
        ]);

    }

    public function orderList2($id){
        $uid = Session::get('client_id');
        $invoices = DB::table('invoices')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('products','invoices.product_id','=','products.id')
            ->select('invoices.*','products.product_name','products.product_description')
            ->where('invoices.status',$id)
            ->where('orders.client_id',$uid)
            ->get();

        return view('client.profile.order-list2',[
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }

    public function orderDetails($id){
        $invoices = DB::table('invoices')
            ->join('orders','invoices.order_id','=','orders.id')
            ->join('products','invoices.product_id','=','products.id')
            ->join('vendors','invoices.vendor_id','=','vendors.id')
            ->select('invoices.*','products.product_name','products.product_description','vendors.full_name','vendors.phone','orders.full_address','orders.district')
            ->where('invoices.order_id',$id)
            ->get();

        return view('client.profile.order-details',[
            'order' => Order::find($id),
            'invoices' => $invoices
        ]);
    }


}
