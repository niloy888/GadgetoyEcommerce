@extends('Client.master')


@section('home-content')
    <!-- Shop-1 -->
    <section id="header" class="main-header">
        <div class="container-fluid">
            <div class="intro row">
                <div class="overlay"></div>
                <div class="col-6 offset-6 mb-2">
                    @if(Session::get('client_id'))

                    @else
                        <a href="{{route('client-login')}}" type="button" class="btn btn-light mb-2">Log in</a>
                        <a href="{{route('client-register')}}" type="button" class="btn btn-primary mb-2">Sign up</a>
                    @endif
                </div>
                <!--
                <div class="col-6 offset-6">
                    <button class="btn btn-primary">Sign in</button>
                </div> -->
                <div class="col-6 offset-6">
                    <h2 class="header-quote">Save time-to-time</h2>
                    <p>
                        Your sweeping costs with the
                    </p>
                    <h1 class="header-title">Gadgetoy<br><span class="thin">By Niloy</span></h1>
                </div>
            </div>

        </div>

    </section>

    {{--slider--}}
    <section id="product" class="trending">
        <div class="container-fluid section-bg">
            <div class="row">
                <div class="col-md-12">
                    <h2>Trending <b>Products</b></h2>
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
                        <!-- Carousel indicators -->
                        <!--<ol class="carousel-indicators">-->
                        <!--	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>-->
                        <!--	<li data-target="#myCarousel" data-slide-to="1"></li>-->
                        <!--	<li data-target="#myCarousel" data-slide-to="2"></li>-->
                        <!--</ol>   -->
                        <!-- Wrapper for carousel items -->
                        <div class="carousel-inner">
                            <div class="item carousel-item active">
                                <div class="row">
                                    @foreach($carouselProducts as $product)
                                        <div class="col-sm-2">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                        <img src="{{asset($product->product_image)}}"
                                                             class="img-responsive img-fluid" alt="">
                                                    </a>
                                                </div>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <div class="thumb-content">
                                                        <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                            <h4 style="color: black;">{{$product->product_name}}</h4>
                                                        </a>
                                                        <p class="item-price">
                                                            <span>৳ {{$product->product_price}}</span></p>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                @if($product->rating==1)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>

                                                                @elseif($product->rating==2)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>


                                                                @elseif($product->rating==3)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>

                                                                @elseif($product->rating==4)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>


                                                                @elseif($product->rating==5)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>

                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <input type="hidden" name="qty" value="1"/>
                                                        <input type="hidden" name="id" value="{{$product->id}}"/>
                                                        {{--<a href="cart.html" class="btn btn-primary">Add to Cart</a>--}}
                                                        <input type="submit" class="btn btn-primary"
                                                               value="Add to Cart">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="row">
                                    @foreach($carouselProducts2 as $product)
                                        <div class="col-sm-2">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                        <img src="{{asset($product->product_image)}}"
                                                             class="img-responsive img-fluid" alt="">
                                                    </a>
                                                </div>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <div class="thumb-content">
                                                        <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                            <h4 style="color: black;">{{$product->product_name}}</h4>
                                                        </a>
                                                        <p class="item-price">
                                                            <span>৳ {{$product->product_price}}</span></p>
                                                        <div class="star-rating">
                                                            <ul class="list-inline">
                                                                @if($product->rating==1)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>

                                                                @elseif($product->rating==2)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>


                                                                @elseif($product->rating==3)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>

                                                                @elseif($product->rating==4)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>


                                                                @elseif($product->rating==5)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>

                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <input type="hidden" name="qty" value="1"/>
                                                        <input type="hidden" name="id" value="{{$product->id}}"/>
                                                        {{--<a href="cart.html" class="btn btn-primary">Add to Cart</a>--}}
                                                        <input type="submit" class="btn btn-primary"
                                                               value="Add to Cart">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="item carousel-item">
                                <div class="row">


                                    @foreach($carouselProducts3 as $product)
                                        <div class="col-sm-2">
                                            <div class="thumb-wrapper">
                                                <div class="img-box">
                                                    <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                        <img src="{{asset($product->product_image)}}"
                                                             class="img-responsive img-fluid" alt="">
                                                    </a>
                                                </div>
                                                <form action="{{route('add-to-cart')}}" method="post">
                                                    @csrf
                                                    <div class="thumb-content">
                                                        <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                            <h4 style="color: black;">{{$product->product_name}}</h4>
                                                        </a>
                                                        <p class="item-price">
                                                            <span>৳ {{$product->product_price}}</span></p>
                                                        {{--<div class="star-rating">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item"><i class="fa fa-star"></i>
                                                                </li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i>
                                                                </li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i>
                                                                </li>
                                                                <li class="list-inline-item"><i class="fa fa-star"></i>
                                                                </li>
                                                                <li class="list-inline-item"><i
                                                                        class="fa fa-star-o"></i></li>
                                                            </ul>
                                                        </div>--}}

                                                        <div class="star-rating">


                                                            <ul class="list-inline">
                                                                @if($product->rating==1)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>

                                                                @elseif($product->rating==2)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>


                                                                @elseif($product->rating==3)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>

                                                                @elseif($product->rating==4)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star-outline"></i></li>


                                                                @elseif($product->rating==5)
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>
                                                                    <li class="list-inline-item"><i
                                                                            class="ion-ios-star"></i></li>

                                                                @endif
                                                            </ul>


                                                        </div>


                                                        <input type="hidden" name="qty" value="1"/>
                                                        <input type="hidden" name="id" value="{{$product->id}}"/>
                                                        {{--<a href="cart.html" class="btn btn-primary">Add to Cart</a>--}}
                                                        <input type="submit" class="btn btn-primary"
                                                               value="Add to Cart">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Carousel controls -->
                        <a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--end of slider--}}





    <!-- shop-1 -->


    <!-- Shop-2 -->

    <section class="shop shop-2">
        <div class="container-fluid page-bgc">
            <div class="row">


                <!--left column-->
                <div class="col-3">
                    <div class="sidebar-head mt-3">
                        <!--<header class="py-3">-->
                        <!--	<a href="#" class="sidebar-toggler position-absolute m-2 bg-white d-block d-md-none" data-toggle="collapse" data-target="#sidebar-main" aria-controls="sidebar-main" aria-expanded="false" aria-label="Toggle navigation">-->
                        <!--		<span class="sidebar-toggler-icon"></span>-->
                        <!--	</a>-->
                        <!--	<h1 class="text-center text-white"><small>Product Categories</small></h1>-->
                        <!--</header>-->

                        <!-- Main sidebar -->
                        <div id="sidebar-main" class="sidebar sidebar-default sidebar-separate sidebar-fixed">
                            <div class="sidebar-content">

                                <div class="sidebar-category sidebar-default ">
                                    <div class="category-title ">
                                        <span>Product Categories</span>
                                    </div>
                                    <div class="category-content">
                                        <ul id="fruits-nav" class="nav flex-column">
                                            @foreach($categories as $category)
                                                <li class="nav-item">
                                                    <a href="{{ route('category',['id'=>$category->id]) }}"
                                                       class="nav-link active">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                        {{$category->category_name}}
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                        <!-- /Nav -->
                                    </div>
                                    <!-- /Category Content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--left column-->

                <div class="col-9">
                    <div class="col-12">
                        <div class="title-box mt-4">
                            <p>Get our</p>
                            <h2 class="title mt0">Products</h2>
                        </div>
                    </div>


                    <!--<div class="container-fluid">-->


                    <div class="row">

                        @foreach($products as $product)
                            <div class="col-sm-3">
                                <form action="{{route('add-to-cart')}}" method="post">
                                    @csrf
                                    <div class="shop-box">
                                        <img class="img-full img-responsive" src="{{asset($product->product_image)}}"
                                             alt="shop">
                                        <div class="shop-box-hover text-center">
                                            <div class="c-table">
                                                <div class="c-cell">
                                                    <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                        <span class="ion-ios-information"></span>
                                                    </a>
                                                    <input type="hidden" value="{{$product->id}}" name="id">
                                                    <input type="hidden" value="1" name="qty">
                                                    <button>
                                                        <span class="ion-ios-cart"></span>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="shop-box-title">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('product',['id'=>$product->id,'category_id'=>$product->category_id])}}">
                                                <h4 style="color: black">{{$product->product_name}}</h4>
                                            </a>
                                        </div>
                                        <div class="col-sm-3">
                                            <p class="shop-price">
                                                ৳ {{$product->product_price}}
                                            </p>
                                            <div class="star">

                                                @if($product->rating==1)
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>

                                                @elseif($product->rating==2)
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>

                                                @elseif($product->rating==3)
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star-outline"></span>
                                                    <span class="ion-ios-star-outline"></span>

                                                @elseif($product->rating==4)
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star-outline"></span>

                                                @elseif($product->rating==5)
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                    <span class="ion-ios-star"></span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <!--<div class="row">-->
                    <!--    <div class="col-9">-->
                    <!--        <nav aria-label="Page navigation" class="pager justify-content-center">-->
                    <!--          <ul class="pagination">-->
                    <!--            <li class="page-item">-->
                    <!--              <span class="page-link">Previous</span>-->
                    <!--            </li>-->
                    <!--            <li class="page-item active"><a class="page-link" href="#">1</a></li>-->
                    <!--            <li class="page-item">-->
                    <!--              <span class="page-link">-->
                    <!--                2-->
                    <!--                <span class="sr-only">(current)</span>-->
                    <!--              </span>-->
                    <!--            </li>-->
                    <!--            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                    <!--            <li class="page-item">-->
                    <!--              <a class="page-link" href="#">Next</a>-->
                    <!--            </li>-->
                    <!--          </ul>-->
                    <!--         </nav>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div> <!-- boxed -->
            </div>

            <!--right-column-->
        </div>
    </section>

    <!-- shop-2 -->


    <!-- Shop-3 -->



    <!-- shop-3 -->
@endsection
