<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $categoriesItems => $categoriesItemTab)
                <li class="{{$categoriesItems == 0 ? 'active' : ''}}">
                    <a href="#category_tab_{{ $categoriesItemTab->id }}"
                       data-toggle="tab">{{$categoriesItemTab->name}}</a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="tab-content">
        @foreach($categories as $key => $categoryItemProduct )
            <div class="tab-pane fade {{ $key == 0 ? 'active in' : '' }}"
                 id="category_tab_{{ $categoryItemProduct->id }}">
                @foreach($categoryItemProduct->products as $productCategoryTab)
                    <form>
                        @csrf
                        <input type="hidden" value="{{ $productCategoryTab->id }}"
                               class="cart_product_id_{{ $productCategoryTab->id }}">

                        <input type="hidden" value="{{ $productCategoryTab->name }}"
                               class="cart_product_name_{{ $productCategoryTab->id }}">

                        <input type="hidden" value="{{ $productCategoryTab->feature_image_path }}"
                               class="cart_product_image_{{ $productCategoryTab->id }}">

                        <input type="hidden" value="{{ $productCategoryTab->price }}"
                               class="cart_product_price_{{ $productCategoryTab->id }}">

                        <input type="hidden" value="1"
                               class="cart_product_qty_{{ $productCategoryTab->id }}">
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="{{ route('home.details',$productCategoryTab->id ) }}">
                                        <img src="{{ $productCategoryTab->feature_image_path }}" alt=""/>
                                        </a>
                                        <h2>{{ number_format($productCategoryTab->price) }} $</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button"
                                                class="btn btn-default add-to-cart"
                                                data-id_product="{{ $productCategoryTab->id  }}"
                                                name="add-to-cart">
                                            <i class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </form>
            </div>
        @endforeach
    </div>
</div>
