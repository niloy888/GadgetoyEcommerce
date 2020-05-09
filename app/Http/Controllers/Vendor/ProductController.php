<?php

namespace App\Http\Controllers\Vendor;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function addProduct(){

        $categories = Category::where('publication_status',1)->get();
        $brands     = Brand::where('publication_status',1)->get();

        return view('vendor.product.add-product', [
            'categories' => $categories,
            'brands'     => $brands
        ]);
    }

    public function newProduct(Request $request){


        $this->validate($request, [
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();


        $productImage = $request->file('product_image');
        $imageName    = $productImage->getClientOriginalName();
        $directory    = 'product-images/';
        //$productImage->move($directory,$imageName);
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->resize(200,200)->save($imageUrl);


        $product->category_id         = $request->category_id;
        $product->brand_id            = $request->brand_id;
        $product->vendor_id           = $request->vendor_id;
        $product->product_name        = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price       = $request->product_price;
        $product->product_quantity    = $request->product_quantity;
        $product->product_discount    = $request->product_discount;
        $product->product_image       = $imageUrl;
        $product->publication_status  = $request->publication_status;
        $product->save();

        return back()->with('message','Product created successfully');

    }

    public function manageProduct(){

        $products = DB::table('products')
            ->join('categories','categories.id','=','products.category_id')
            ->join('brands','brands.id','=','products.brand_id')
            ->select('products.*','categories.category_name','brands.brand_name')
            ->get();

        return view('vendor.product.manage-product', [
            'products' => $products
        ]);
    }

    public function editProduct($id){

        return view('vendor.product.edit-product',[
            'categories' => Category::where('publication_status',1)->get(),
            'brands' => Brand::where('publication_status',1)->get(),
            'product' => Product::find($id)
        ]);

        /*$product = Product::find($id);
        return $product;*/

    }

    public function updateProduct(Request $request){

        $productImage = $request->file('product_image');
        if ($productImage) {
            $product = Product::find($request->id);
            unlink($product->product_image);


            $imageName    = $productImage->getClientOriginalName();
            $directory    = 'product-images/';
            //$productImage->move($directory,$imageName);
            $imageUrl = $directory.$imageName;
            Image::make($productImage)->resize(200,200)->save($imageUrl);

            $product->category_id         = $request->category_id;
            $product->brand_id            = $request->brand_id;
            $product->product_name        = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price       = $request->product_price;
            $product->product_quantity    = $request->product_quantity;
            $product->product_discount    = $request->product_discount;
            $product->product_image       = $imageUrl;
            $product->publication_status  = $request->publication_status;
            $product->save();
        }

        else{

            $product = Product::find($request->id);
            $product->category_id         = $request->category_id;
            $product->brand_id            = $request->brand_id;
            $product->product_name        = $request->product_name;
            $product->product_description = $request->product_description;
            $product->product_price       = $request->product_price;
            $product->product_quantity    = $request->product_quantity;
            $product->product_discount    = $request->product_discount;
            $product->publication_status  = $request->publication_status;
            $product->save();

        }

        return back()->with('message','Product updated successfully');
    }

    public function deleteProduct(Request $request){

        $product = Product::find($request->id);
        unlink($product->product_image);
        $product->delete();
        return back()->with('message','Product deleted successfully!!');

    }

    public function unpublishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 0;
        $product->save();
        return back()->with('message','Product is now unpublished');
    }

    public function publishedProduct($id){
        $product = Product::find($id);
        $product->publication_status = 1;
        $product->save();
        return back()->with('message','Product is now published');
    }


}
