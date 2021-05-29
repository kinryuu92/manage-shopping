<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {

        return view('frontEnd.cart.cart');
    }

    public function addCart(Request $request)
    {
        $data = $request->all();
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');
        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $value) {
                if ($value['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_name' => $data['cart_product_name'],
                    'product_id' => $data['cart_product_id'],
                    'product_image' => $data['cart_product_image'],
                    'product_qty' => $data['cart_product_qty'],
                    'product_price' => $data['cart_product_price'],
                );
                Session::put('cart', $cart);
            }

        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
            );
        }
        Session::put('cart', $cart);
        Session::save();
    }

    public function deleteCart($session_id)
    {
        $cart = Session::get('cart');

        if ($cart == true) {
            foreach ($cart as $key => $value) {
                if ($value['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Xoá sản phẩm thành công');
        } else {
            return redirect()->back()->with('message', 'Xoá sản phẩm thất bại');

        }
    }

    public function updateCart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($data['cart_qty'] as $key => $qty) {
                foreach ($cart as $session => $value) {
                    if ($value['session_id'] == $key) {
                        $cart[$session]['product_qty'] = $qty;
                    }
                }
            }
            Session::put('cart', $cart);
            return redirect()->back()->with('message', 'Cập nhật số lượng thành công');
        } else {
            return redirect()->back()->with('message', 'Cập nhật số lượng thất bại');
        }
    }
}
