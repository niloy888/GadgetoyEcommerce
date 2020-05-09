<?php

namespace App\Http\Controllers\Vendor;

use App\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class AuthController extends Controller
{

    public function authCheck()
    {
        $admin = Session::get('vendor_id');
        if ($admin == NULL) {
            return redirect('vendor-login')->send();
        }
    }


    public function vendorLogin()
    {
        return view('vendor.login.login');
    }


    // for vendor register----------
    public function vendorRegister()
    {
        return view('vendor.register.register');

    }

    // for vendor new login
    public function vendorNewLogin(Request $request)
    {
        $vendor = Vendor::where('email', $request->email)->first();
        if ($vendor) {

            if (password_verify($request->password, $vendor->password)) {

                if($vendor->activity == 1){
                    Session::put("vendor_id",$vendor->id);
                    Session::put("vendor_name",$vendor->full_name);
                    //  return redirect("vendor-dashboard");
                    return view('vendor.home.home');
                }
                else{
                    return redirect("/vendor-login")->with("message","You are not accepted yet. Please contact with main admin");
                }
            }

            else {
                return redirect("/vendor-login")->with("message","password not valid!!");
            }
        }
        else{
            return redirect("/vendor-login")->with("message","email not valid!!");
        }

    }
    // for vendor save information ---------------

    public function vendorSave(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'phone'     => 'required',
            'city'      => 'required',
            'location'  => 'required',
            'nid'       => 'required',
        ]);


        $vendor = new Vendor();
        $check = Vendor::where('email', $request->email)->first();
        $emailCheck ='';
        if ($check!=null)
        {
            $emailCheck = $check->email;
        }




        if ($emailCheck==$request->email){
            return back()->with('message','Email already exists');
        }

        else{

            $vendor->full_name          = $request->full_name;
            $vendor->email              = $request->email;
            $vendor->password           = bcrypt($request->password);
            $vendor->phone              = $request->phone;
            $vendor->city               = $request->city;
            $vendor->location           = $request->location;
            $vendor->nid                = $request->nid;
            $vendor->save();
            Session::put('vendor_id',$vendor->id);
            Session::put('vendor_name',$vendor->full_name);
            return back()->with('message','Your account has been created successfully. Please wait for admin confirmation.');

        }



    }


    public function vendorLogout()
    {
        Session::forget('vendor_name');
        Session::forget('vendor_id');
        return redirect('vendor-login')->with('message','Logged out successfully!!');
    }


    public function vendorDashboard()
    {
        $this->authCheck();
        return view('vendor.home.home');
    }

}
