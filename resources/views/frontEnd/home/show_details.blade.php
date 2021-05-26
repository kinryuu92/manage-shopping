@extends('frontEnd.layouts.master')

@section('content')

    <!--product-details-->
    @foreach($productDetails as $productDetail)
        <div class="product-details">
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{ $productDetail->feature_image_path }}"
                         style="height: 450px ; width: auto ; margin-left: 100px" alt=""/>
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    {{--                    <div class="carousel-inner">--}}
                    {{--                        @foreach($productDetail->image as $key=>$productImage)--}}
                    {{--                            <div class="item active">--}}
                    {{--                                <a href=""><img src="" alt=""></a>--}}
                    {{--                            </div>--}}
                    {{--                        @endforeach--}}
                    {{--                    </div>--}}


                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="{{asset('eshopper/images/product-details/new.jpg')}}" class="newarrival" alt=""/>
                    <h2>{{  $productDetail->name }}</h2>
                    <p>Code ID: {{ $productDetail->id }}</p>
                    <span>
                        	<span>{{ number_format($productDetail->price) }} VNĐ</span>
									<label>Quantity:</label>
									<input type="number" min="1" value="1"/>
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>

                    </span>
                    <p><b>Dung tích: </b>{{ $productDetail->capacity }}</p>
                    <p><b>Nồng độ: </b> {{ $productDetail->alcohol_concentration }}</p>
                    <p><b>Category:</b> {{ $productDetail->category->name }}</p>
                    <p>{!! $productDetail->content !!} </p>

                    <div class="fb-like" data-href="{{ $url }}" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
                </div><!--/product-information-->
            </div>
        </div>
    @endforeach
    <!--/product-details-->

    <!--recommended_items-->
    <div class="recommended_items">
        <h2 class="title text-center">related items</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach($productRelateds as $key => $productRelated)
                        <a href="{{ route('home.details' , ['id'=>$productRelated->id]) }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{ $productRelated->feature_image_path }}"
                                                 style="width: auto; height :255px" alt=""/>
                                            <h2>{{ number_format($productRelated->price) }}</h2>
                                            <p>{{ $productRelated->name }}</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </a>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->

@endsection
