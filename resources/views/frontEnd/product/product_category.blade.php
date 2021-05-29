@extends('frontEnd.layouts.master')
@section('css')
    <link href="{{ asset('front_end/front_end.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('front_end/front_end.js') }}"></script>
@endsection


@section('content')

    <!--slider-->
    @include('frontEnd.home.component.slider')
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">

                @include('frontEnd.components.sidebar')

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    <section>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-9 padding-right">
                                    <div class="features_items"><!--features_items-->
                                        <h2 class="title text-center">Features Items</h2>
                                        @foreach($productCategory as $product)
                                            <form>
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}"
                                                       class="cart_product_id_{{ $product->id }}">

                                                <input type="hidden" value="{{ $product->name }}"
                                                       class="cart_product_name_{{ $product->id }}">

                                                <input type="hidden" value="{{ $product->feature_image_path }}"
                                                       class="cart_product_image_{{ $product->id }}">

                                                <input type="hidden" value="{{ $product->price }}"
                                                       class="cart_product_price_{{ $product->id }}">

                                                <input type="hidden" value="1"
                                                       class="cart_product_qty_{{ $product->id }}">
                                                <div class="col-sm-4">
                                                    <div class="product-image-wrapper">
                                                        <div class="single-products">
                                                            <div class="productinfo text-center">
                                                                <img src="{{ $product->feature_image_path }}" alt=""/>
                                                                <h2>{{ number_format($product->price) }} $</h2>
                                                                <p>{{ $product->name }}</p>
                                                                <button type="button"
                                                                        class="btn btn-default add-to-cart"
                                                                        data-id_product="{{ $product->id  }}"
                                                                        name="add-to-cart">
                                                                    <i class="fa fa-shopping-cart"></i>Add to cart
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="choose">
                                                            <ul class="nav nav-pills nav-justified">
                                                                <li><a href=""><i class="fa fa-plus-square"></i>Add to
                                                                        wishlist</a></li>
                                                                <li><a href=""><i class="fa fa-plus-square"></i>Add to
                                                                        compare</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </form>
                                            {{ $productCategory->links() }}
                                    </div><!--features_items-->
                                </div>
                            </div>
                        </div>
                    </section>


                    <!--features_items-->

                    <!--category-tab-->
                @include('frontEnd.home.component.category_tab')
                <!--/category-tab-->

                    <div class="recommended_items"><!--recommended_items-->
                        <h2 class="title text-center">recommended items</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="eshopper/images/home/recommend1.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="eshopper/images/home/recommend2.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="eshopper/images/home/recommend3.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="eshopper/images/home/recommend1.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="eshopper/images/home/recommend2.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="eshopper/images/home/recommend3.jpg" alt=""/>
                                                    <h2>$56</h2>
                                                    <p>Easy Polo Black Edition</p>
                                                    <a href="#" class="btn btn-default add-to-cart"><i
                                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel"
                               data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel"
                               data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>

@endsection




