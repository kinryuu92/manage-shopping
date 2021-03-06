<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;


class FrontEndController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        return view('frontEnd.home.home', compact('sliders', 'categories', 'products'));
    }


    public function details($id, Request $request)
    {
        $productDetails = Product::where('id', $id)->get();
        foreach ($productDetails as $key => $productDetail) {
            $category_id = $productDetail->category_id;
            $url = $request->url();
            $imageUrl = url($productDetail->feature_image_path);
        }
        $productRelateds = Product::where('category_id', $category_id)->whereNotIn('id', [$id])->get();

        return view('frontEnd.product.show_details', compact('productDetails', 'productRelateds', 'url', 'imageUrl'));
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $search_product = Product::where('name', 'like', '%' . $keywords . '%')->take(12)->get();
        $categories = Category::where('parent_id', 0)->get();
        $sliders = Slider::latest()->get();
        return view('frontEnd.product.search', compact('search_product', 'sliders', 'categories'));
    }

    public function productCategory($slug, $categoryId)
    {
        $categories = Category::where('parent_id', 0)->get();
        $sliders = Slider::latest()->get();
        $productCategory = Product::where('category_id', $categoryId)->paginate(12);
        return view('frontEnd.product.product_category', compact('categories', 'sliders', 'productCategory'));
    }
}
