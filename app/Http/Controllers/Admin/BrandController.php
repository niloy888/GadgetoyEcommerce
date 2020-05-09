<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addBrand(){
        return view('admin.brand.add-brand');
    }

    public function newBrand(Request $request){
        $this->validate($request,[
            'brand_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20',
            'publication_status' => 'required'
        ]);

        $brand = new Brand();
        $brand->brand_name         = $request->brand_name;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return back()->with('message','Brand added successfully');
    }

    public function manageBrand(){

        return view('admin.brand.manage-brand',[
            'brands' => Brand::all()
        ]);

    }

    public function editBrand($id){

        return view('admin.brand.edit-brand',[
            'brand' => Brand::find($id)
        ]);

    }

    public function updateBrand(Request $request){

        $brand = Brand::find($request->id);
        $brand->brand_name        = $request->brand_name;
        $brand->publication_status   = $request->publication_status;
        $brand->save();

        return back()->with('message','Brand updated successfully');
    }

    public function deleteBrand(Request $request){


        $brand = Brand::find($request->id);
        $brand->delete();
        return back()->with('message','Brand deleted successfully!!');

    }

    public function unpublishedBrand($id){
        $brand = Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('/brand/manage-brand')->with('message','Brand is now unpublished');
    }

    public function publishedBrand($id){
        $brand = Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('/brand/manage-brand')->with('message','Brand is now published');
    }

}
