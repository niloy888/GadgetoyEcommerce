@extends('vendor.master')

@section('title')
    Add Product
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h2 class="text-success text-center">{{Session::get('message')}}</h2>
                <h2 class="text-danger text-center">{{$errors->has('product_image') ? $errors->first('product_image') : ' '}}</h2>

                <form action="{{route('new-product')}}" method="post" class="form-horizontal"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="vendor_id" value="{{Session::get('vendor_id')}}" />
                    <div class="container">

                        <div class="form-group">
                            <label class="control-label col-md-3">Category</label>
                            <div class="col-md-6">
                                <select class="form-control" name="category_id">
                                    <option>Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ' '}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Brand</label>
                            <div class="col-md-6">
                                <select class="form-control" name="brand_id">
                                    <option>Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ' '}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_name" class="control-label col-md-3">Product Name</label>
                            <div class="col-md-6">
                                <input required id="product_name" type="text" name="product_name" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label col-md-3">Product Description</label>
                            <div class="col-md-6">
                                <textarea required id="description" name="product_description" class="form-control"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_price" class="control-label col-md-3">Product Price</label>
                            <div class="col-md-6">
                                <input required id="product_price" type="number" step="any" name="product_price"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_quantity" class="control-label col-md-3">Product Quantity</label>
                            <div class="col-md-6">
                                <input required id="product_quantity" type="number" name="product_quantity" class="form-control">

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="product_discount" class="control-label col-md-3">Product Discount</label>
                            <div class="col-md-6">
                                <input required id="product_discount" type="number" name="product_discount" class="form-control">

                            </div>
                        </div>


                        <div class="form-group">
                            <label for="product_image" class="control-label col-md-3">Product Image</label>
                            <div class="col-md-6">
                                <input required id="product_image" type="file" name="product_image" class="form-control">

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Publication status</label>
                            <div class="col-md-9 radio">
                                <label> <input required type="radio" name="publication_status" value="1"> Published </label>
                                <label> <input type="radio" name="publication_status" value="0"> Unpublished </label><br/>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="submit" class="btn btn-success btn-block" value="save">
                            </div>
                        </div>

                    </div>


                </form>
            </div>
        </div>
    </div>
@endsection
