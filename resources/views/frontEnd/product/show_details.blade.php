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

                    <form>
                        @csrf
                        <input type="hidden" value="{{ $productDetail->id }}"
                               class="cart_product_id_{{ $productDetail->id }}">

                        <input type="hidden" value="{{ $productDetail->name }}"
                               class="cart_product_name_{{ $productDetail->id }}">

                        <input type="hidden" value="{{ $productDetail->feature_image_path }}"
                               class="cart_product_image_{{ $productDetail->id }}">

                        <input type="hidden" value="{{ $productDetail->price }}"
                               class="cart_product_price_{{ $productDetail->id }}">

                        <input type="hidden" value="1"
                               class="cart_product_qty_{{ $productDetail->id }}">
                        <span>
                        	<span>{{ number_format($productDetail->price) }} $</span>
									<label>Quantity:</label>
									<input name="qty" type="number" min="1" value="1"/>
									<input name="productid_hidden" type="hidden" value="{{$productDetail->id}}"/>

									<button style="margin-bottom: 4px" type="button" class="btn btn-default add-to-cart"
                                            name="add-to-cart" data-id_product="{{ $productDetail->id  }}">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                          </span>
                    </form>
                    <p><b>Dung tích: </b>{{ $productDetail->capacity }}</p>
                    <p><b>Nồng độ: </b> {{ $productDetail->alcohol_concentration }}</p>
                    <p><b>Category:</b> {{ $productDetail->category->name }}</p>
                    <p>{!! $productDetail->content !!} </p>

                    <div class="fb-like" data-href="{{ $url }}" data-width="" data-layout="button_count"
                         data-action="like" data-size="small" data-share="true"></div>
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
                        <form>
                            @csrf
                            <input type="hidden" value="{{ $productRelated->id }}"
                                   class="cart_product_id_{{ $productRelated->id }}">

                            <input type="hidden" value="{{ $productRelated->name }}"
                                   class="cart_product_name_{{ $productRelated->id }}">

                            <input type="hidden" value="{{ $productRelated->feature_image_path }}"
                                   class="cart_product_image_{{ $productRelated->id }}">

                            <input type="hidden" value="{{ $productRelated->price }}"
                                   class="cart_product_price_{{ $productRelated->id }}">

                            <input type="hidden" value="1"
                                   class="cart_product_qty_{{ $productRelated->id }}">

                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="{{ route('home.details' , ['id'=>$productRelated->id]) }}">
                                            <img src="{{ $productRelated->feature_image_path }}"
                                                 style="width: auto; height :255px" alt=""/>
                                            </a>
                                            <h2>{{ number_format($productRelated->price) }} $</h2>
                                            <p>{{ $productRelated->name }}</p>
                                            <button type="button" class="btn btn-default add-to-cart"
                                                    data-id_product="{{ $productRelated->id  }}" name="add-to-cart" >
                                                <i class="fa fa-shopping-cart" ></i>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </form>
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
