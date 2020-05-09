<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function addCategory()
    {
        return view('admin.category.add-category');
    }

    public function newCategory(Request $request)
    {

        $category = new Category();
        $category->category_name        = $request->category_name;
        $category->publication_status   = $request->publication_status;
        $category->save();



        return back()->with('message','Category added successfully');

    }

    public function manageCategory()
    {
        return view('admin.category.manage-category',[
            'categories' => Category::all()
        ]);
    }

    public function editCategory($id){

        return view('admin.category.edit-category',[
            'category' => Category::find($id)
        ]);

    }

    public function updateCategory(Request $request){

        $category = Category::find($request->id);
        $category->category_name        = $request->category_name;
        $category->publication_status   = $request->publication_status;
        $category->save();

        return back()->with('message','Category updated successfully');
    }

    public function deleteCategory(Request $request){


        $category = Category::find($request->id);
        $category->delete();
        return back()->with('message','Category deleted successfully!!');

    }

    public function unpublishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 0;
        $category->save();
        return back()->with('message','Category is now unpublished');
    }

    public function publishedCategory($id){
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();
        return back()->with('message','Category is now published');
    }


}
