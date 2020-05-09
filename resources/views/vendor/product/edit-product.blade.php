@extends('vendor.master')

@section('title')
    Edit product
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="well">

                <h1 class="text-center text-success"> {{Session::get('message')}} </h1>
                <form action="{{route('update-product')}}" name="editProductForm" method="post" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="container">

                        <div class="form-group">
                            <label class="control-label col-md-3">Category Name</label>
                            <div class="col-md-6">
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('category_id') ? $errors->first('category_id') : ' '}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Brand Name</label>
                            <div class="col-md-6">
                                <select name="brand_id" class="form-control">
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->has('brand_id') ? $errors->first('brand_id') : ' '}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Name</label>
                            <div class="col-md-6">
                                <input type="text" name="product_name" class="form-control" value="{{$product->product_name}}">
                                <input type="hidden" name="id" class="form-control" value="{{$product->id}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Description</label>
                            <div class="col-md-6">
                                <textarea name="product_description" class="form-control">{{$product->product_description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Price</label>
                            <div class="col-md-6">
                                <input type="number" step="any" name="product_price" class="form-control"
                                       value="{{$product->product_price}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Quantity</label>
                            <div class="col-md-6">
                                <input type="number" name="product_quantity" class="form-control"
                                       value="{{$product->product_quantity}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Product Discount</label>
                            <div class="col-md-6">
                                <input type="number" name="product_discount" class="form-control"
                                       value="{{$product->product_discount}}">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="control-label col-md-3">Product Image</label>
                            <div class="col-md-6">
                                <input type="file" name="product_image" accept="image/*">
                                <span class="text-danger">{{$errors->has('product_image') ? $errors->first('product_image') : ' '}}</span>
                                <br/><br/>
                                <img src="{{asset($product->product_image)}}" alt="" height="100" width="120">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Publication status</label>
                            <div class="col-md-9 radio">
                                <label> <input type="radio"
                                               {{$product->publication_status == 1 ? 'checked' : ''}} name="publication_status"
                                               value="1"> Published </label>
                                <label> <input type="radio"
                                               {{$product->publication_status == 0 ? 'checked' : ''}} name="publication_status"
                                               value="0"> Unpublished </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="submit" class="btn btn-success btn-block" value="update">
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.forms['editProductForm'].elements['category_id'].value = '{{ $product->category_id }}';
        document.forms['editProductForm'].elements['brand_id'].value = '{{ $product->brand_id }}';
    </script>
    <script>

    </script>
@endsection
