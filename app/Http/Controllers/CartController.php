<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    // Show cart
    public function show_cart_menu()
    {
        $cart = count(Session::get('cart'));
        $output = '';
       if ($cart>0){
           $output .= '<span class="badge">' . $cart . '</span>';
       }
       else
       {
           $output .= '<span class="badge">'.''.'</span>';
       }
        echo $output;
    }

    public function hover_cart()
    {
        $cart = count(Session::get('cart'));
        $output = '';
        if ($cart > 0) {

            $output .= '<ul class="hover-cart">';

            foreach (Session::get('cart') as $key => $value) {
                $output .= '<li><a href="#">
							<img src="'.asset(''.$value['product_image']).'">
							<p>'.$value['product_name'].'</p>
							<p>'.number_format($value['product_price']).' VND'.'</p >
							<p > Số lượng: '.$value['product_qty'].'</p >
							</a >
							    <a class="delete-hover-cart" href="'.url('/delete-product/'.$value['session_id']).'">
                                    <i class="fa fa-times "></i>
                                 </a>
							</li >';
                        }

                $output .= '</ul >';
        }

        else {
            $output .= '<ul class="hover-cart">
						<li><p>Giỏ hàng trống</p></li >

					</ul > ';
        }


        echo $output;
    }

    public function add_cart_ajax(Request $request)
    {
        $data = $request->all();
        // Session::forget('cart');
        $session_id = substr(md5(microtime()), rand(0, 26), 5);
        $cart = Session::get('cart');

        if ($cart == true) {
            $is_avaiable = 0;
            foreach ($cart as $key => $val) {
                if ($val['product_id'] == $data['cart_product_id']) {
                    $is_avaiable++;
                }
            }
            if ($is_avaiable == 0) {
                $cart[] = array(
                    'session_id' => $session_id,
                    'product_id' => $data['cart_product_id'],
                    'product_name' => $data['cart_product_name'],
                    'product_image' => $data['cart_product_image'],
                    'product_price' => $data['cart_product_price'],
                    'product_qty' => $data['cart_product_qty'],
                );
                Session::put('cart', $cart);
            }
        } else {
            $cart[] = array(
                'session_id' => $session_id,
                'product_id' => $data['cart_product_id'],
                'product_name' => $data['cart_product_name'],
                'product_image' => $data['cart_product_image'],
                'product_price' => $data['cart_product_price'],
                'product_qty' => $data['cart_product_qty'],
            );
            Session::put('cart', $cart);
        }
//            Session::save();

    }

    public function delete_product($session_id)
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            foreach ($cart as $key => $val) {
                if ($val['session_id'] == $session_id) {
                    unset($cart[$key]);
                }
            }
            Session::put('cart', $cart);
            return Redirect()->back()->with('message', 'Xoá đơn hàng thành công');
        } else {
            return Redirect()->back()->with('message', 'Xoá đơn hàng thất bại');
        }
    }

    public function update_cart(Request $request)
    {
        $data = $request->all();
        $cart = Session::get('cart');
        if ($cart == true) {
            $message = '';

            foreach ($data['cart_qty'] as $key => $qty) {
                $i = 0;
                foreach ($cart as $session => $val) {
                    $i++;

                    if ($val['session_id'] == $key) {

                        $cart[$session]['product_qty'] = $qty;
                        $message .= ' < p style = "color:blue" > ' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_name'] . ' thành công </p > ';

                    } elseif ($val['session_id'] == $key && $qty > $cart[$session]['product_qty']) {
                        $message .= ' < p style = "color:red" > ' . $i . ') Cập nhật số lượng :' . $cart[$session]['product_name'] . ' thất bại </p > ';
                    }

                }

            }

            Session::put('cart', $cart);
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()->back()->with('error', 'Cập nhật số lượng thất bại');
        }
    }

    public function delete_all_product()
    {
        $cart = Session::get('cart');
        if ($cart == true) {
            // Session::destroy();
            Session::forget('cart');
            Session::forget('coupon');
            return redirect()->back()->with('message', 'Xóa hết giỏ hàng thành công');
        }
    }

    public function gio_hang()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        return view('front-end.cart.cart_ajax', compact('categorys', 'categorysLimit'));
    }

    public function save_cart(Request $request)
    {

        $product_id = $request->productid_hidden;
        $quantity = $request->qty;
        $product_info = DB::table('products')->where('product_id', $product_id)->first();

//        Cart::add('293ad', 'Product 1', 1, 9.99, 550);
//        Cart::destroy();
        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->price;
        $data['weight'] = '123';
        $data['options']['image'] = $product_info->feature_image_path;
        Cart::add($data);
        return Redirect::to(' / show - cart');
    }

    public function show_cart()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        return view('front - end . cart . show_cart', compact('categorys', 'categorysLimit'));
    }

    public function delete_to_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to(' / show - cart');
    }

    public function update_cart_quantity(Request $request)
    {
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId, $qty);
        return Redirect::to(' / show - cart');
    }

    // Coupon
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session == true) {
                    $is_avaiable = 0;
                    if ($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return Redirect()->back()->with('message', 'Thêm mã giảm giá thành công');
            }
        } else {
            return \redirect()->back()->with('error', 'Mã giảm giá không đúng');
        }
    }
}
