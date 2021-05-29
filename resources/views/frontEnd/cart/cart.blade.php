@extends('frontEnd.layouts.master')

@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-success">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <form action="{{ route('cart.update') }}" method="post">
                    @csrf
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Image</td>
                            <td class="description">Product name</td>
                            <td class="price">Product price</td>
                            <td class="quantity">Quantity</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(Session::get('cart')==true)
                            @php
                                $total = 0;
                            @endphp
                            @foreach(Session::get('cart') as $key => $cart)
                                @php
                                    $subTotal = $cart['product_price'] * $cart['product_qty'];
                                    $total += $subTotal;
                                @endphp
                                <tr>
                                    <td class="cart_product">
                                        <img src="{{ $cart['product_image'] }}" alt="" width="70px">
                                    </td>
                                    <td class="cart_description">
                                        <p>{{ $cart['product_name'] }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p>{{ number_format($cart['product_price']) }} $</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                            <input class="cart_quantity_input" type="number"
                                                   name="cart_qty[{{ $cart['session_id'] }}]"
                                                   value="{{ $cart['product_qty'] }}" autocomplete="off" size="1"
                                                   min="1">

                                        </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price">{{number_format($subTotal)}} $ </p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete"
                                           href="{{ route('cart.delete' , $cart['session_id'])}}"><i
                                                class="fa fa-times"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                            <td>
                                <input type="submit" value="Update" name="update_qty"
                                       class="btn btn-default update">
                            </td>
                        @else
                            <tr>
                                @php
                                    echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
                                @endphp
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <td>
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Cart Sub Total <span>{{ number_format($total) }}  $ </span></li>
                                <li>Eco Tax <span>$2</span></li>
                                <li>Shipping Cost <span>Free</span></li>
                                <li>Total <span>$61</span></li>
                            </ul>
                            <a class="btn btn-default update" href="">Update</a>
                            <a class="btn btn-default check_out" href="">Check Out</a>
                        </div>
                    </div>
                </td>
            </div>
        </div>
    </section><!--/#do_action-->

@endsection
