<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->paginate(6);
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        return view('front-end.home.index', compact('sliders', 'categorys', 'products', 'productsRecommend', 'categorysLimit'));
    }

    public function search(Request $request)
    {
        $keywords = $request->keyword;
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        $search_product = DB::table('products')->where('product_name','like','%'.$keywords.'%')->get();
        return view('front-end.product.search', compact( 'categorysLimit', 'categorys'))->with('search_product', $search_product);

    }
}
