<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\ContactUs;
use App\Product;
use App\ProductReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GadgetoyEcommerceController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $products = Product::take(8)->orderBy('id','desc')->get();
        //$products = Product::orderBy('id','desc')->paginate(4);
        $carouselProducts = Product::all()->random(6);
        $carouselProducts2 = Product::all()->random(6);
        $carouselProducts3 = Product::all()->random(6);

        return view('client.home.home')->with([
            'categories'=>$categories,
            'products'=>$products,
            'carouselProducts'=>$carouselProducts,
            'carouselProducts2'=>$carouselProducts2,
            'carouselProducts3'=>$carouselProducts3,

        ]);


    }

    public function about(){
        return view('client.about.about');
    }


    public function contactUs(){
        return view('client.contact-us.contact');
    }


    public function contactSubmit(Request $request){

        $contact = new ContactUs();
        $contact->first_name = $request->first_name;
        $contact->last_name  = $request->last_name;
        $contact->email      = $request->email;
        $contact->phone      = $request->phone;
        $contact->message    = $request->message;
        $contact->save();
        return back()->with('message','Message send successfully');

    }


    public function newsFeed(){
        return view('client.news-feed.feed');
    }

    public function productDetails($id,$category_id){


        $products = Product::with('category')
            ->where('category_id',$category_id)
            ->where('id','!=',$id)
            ->take(4)->get();

        $bestProducts = Product::take(3)->orderBy('popularity','desc')->get();

        $product = Product::find($id);

        $reviews = DB::table('product_reviews')

            ->join('products','product_reviews.product_id','=','products.id')
            ->join('clients','clients.id','=','product_reviews.client_id')
            ->select('product_reviews.*','clients.full_name')
            ->where('product_reviews.product_id',$product->id)
            ->orderBy('product_reviews.id','desc')
            ->get();

        $avgRating = ProductReview::where('product_id',$id)->avg('rating');

        $ratingValueIntoInt = (int)$avgRating;

        $product->rating = $ratingValueIntoInt;
        $product->save();

        $totalReviews = ProductReview::where('product_id',$id)->count();





        return view('client.product.product-details')->with([
            'product' => $product,
            'products' => $products,
            'bestProducts' => $bestProducts,
            'reviews' => $reviews,
            'avgRating' => $ratingValueIntoInt,
            'totalReviews' => $totalReviews
        ]);
    }


    public function productReview(Request $request){

        $this->validate($request, [
            'description' => 'required',
            'rating' => 'required'
        ]);



        $product = new ProductReview();
        $product->product_id = $request->product_id;
        $product->client_id = $request->client_id;
        $product->description = $request->description;
        $product->rating = $request->rating;
        $product->save();
        return back()->with('message','Review Submitted Successfully!');

    }


    public function category($id){


        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::with('category')->where('category_id',$id)->get();

        return view('client.category-products.products')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function brand($id){


        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::with('brand')->where('brand_id',$id)->get();

        return view('client.category-products.products')->with([
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products,
        ]);
    }



}
