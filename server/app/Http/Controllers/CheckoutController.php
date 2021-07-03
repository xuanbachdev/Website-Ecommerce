<?php

namespace App\Http\Controllers;

use App\Models\Category;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    private $order;
    public function __construct(Order $order){
        $this->order = $order;
    }
   public function payment(){
       $categorys = Category::where('parent_id', 0)->get();
       $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
       return view('front-end.checkout.payment', compact('categorys','categorysLimit'));
   }

   public function order_place(Request $request){

       $content = Cart::content();
       // Insert payment method
       $data = array();
       $data['payment_method'] = $request->payment_option;
       $data['payment_status'] = 'Đang chờ xử lý';
       $payment_id = DB::table('payment')->insertGetId($data);

       // Insert order
       $order_data = array();
       $order_data['customer_id'] = Session::get('customer_id');
       $order_data['shipping_id'] = Session::get('shipping_id');
       $order_data['payment_id'] = $payment_id;
       $order_data['order_total'] = Cart::total();
       $order_data['order_status'] = 'Đang chờ xử lý';
       $order_id = DB::table('order')->insertGetId($order_data);

       // Insert order details

       $content = Cart::content();
       foreach($content as $v_content){
           $order_d_data['order_id'] = $order_id;
           $order_d_data['product_id'] = $v_content->id;
           $order_d_data['product_name'] = $v_content->name;
           $order_d_data['product_price'] = $v_content->price;
           $order_d_data['product_sales_quantity'] = $v_content->qty;
           DB::table('order_details')->insert($order_d_data);
       }

       if($data['payment_method']==1) {

           echo 'Thanh toán thẻ ATM';
       }
       elseif ($data['payment_method']==2){
           Cart::destroy();
           $categorys = Category::where('parent_id', 0)->get();
           $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
           return view('front-end.checkout.handcash', compact('categorys','categorysLimit'));
       }
       else{
           echo 'Thẻ ghi nợ';
       }
//       return Redirect::to('/payment');
   }
//
//    public function AuthLogin(){
//        $admin_id = Session::get('id');
//        if($admin_id){
//            return Redirect::to('manage-order');
//        }else{
//            return Redirect::to('admin')->send();
//        }
//    }

   public function manage_order(){
            $admin_id = auth()->user()->id;
            $all_order = DB::table('order')
           ->join('customers','order.customer_id','=','customers.customer_id')
           ->select('order.*','customers.customer_name')
           ->orderby('order.order_id','desc')->latest()->paginate(5);

       $manager_order  = view('back-end.admin.order.manage_order')->with('all_order',$all_order);

       return view('back-end.layouts.admin')->with('back-end.admin.order.manage_order', $manager_order);
   }

   public function view_order($orderId){
       $admin_id = auth()->user()->id;
       $order_by_id = DB::table('order')
           ->join('customers','order.customer_id','=','customers.customer_id')
           ->join('shipping','order.shipping_id','=','shipping.shipping_id')
           ->join('order_details','order.order_id','=','order_details.order_id')
           ->select('order.*','customers.*','shipping.*','order_details.*')
           ->where('order.order_id',$orderId)->first();


       $manager_order_by_id  = view('back-end.admin.order.view_order')->with('order_by_id',$order_by_id);
       return view('back-end.layouts.admin')->with('back-end.admin.order.view_order', $manager_order_by_id);
   }

   // Order
    public function confirm_order(Request $request){
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_id = $shipping->shipping_id;

        $checkout_code = substr(md5(microtime()), rand(0,26),5);
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_id;
        $order->order_status = 1;
        $order->order_code = $checkout_code;
        $order->created_at = now();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->save();

        if (Session::get('cart')){
            foreach (Session::get('cart') as $key => $cart){
                $order_details = new OrderDetails();

                $order_details->order_code = $checkout_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->save();
            }
        }

        Session::forget('coupon');
        Session::forget('cart');
    }


}
