<?php

namespace App\Http\Controllers\Admin;

use App\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function manageVendor()
    {

        $vendors = Vendor::orderBy('id','desc')->get();
        return view('admin.vendor.manage-vendors',[
            'vendors' => $vendors
        ]);

    }


    public function acceptVendor($id)
    {
        $vendor = Vendor::find($id);
        $vendor->activity = 1;
        $vendor->save();
        return back();

    }

    // for cancel vendor request-------------

    public function cancelVendor($id)
    {
        $vendor = Vendor::find($id);
        $vendor->activity = 0;
        $vendor->save();
        return back();
    }

    public function deleteVendor(Request $request){


        $vendor = Vendor::find($request->id);
        $vendor->delete();
        return back()->with('message','Vendor deleted successfully!!');

    }

}
