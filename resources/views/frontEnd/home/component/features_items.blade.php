<div class="features_items">
    <h2 class="title text-center">Features Items</h2>
    @foreach($products as $product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
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

                            <a href="{{ route('home.details', $product->id) }}">
                                <img src={{ $product->feature_image_path }} alt=""/>
                            </a>
                            <h2>{{number_format($product->price)}} $</h2>
                            <p>{{ $product->name }}</p>
                            <button type="button" class="btn btn-default add-to-cart" name="add-to-cart"
                                    data-id_product="{{ $product->id  }}">
                                <i class="fa fa-shopping-cart"></i>
                                Add to cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    @endforeach
</div>
