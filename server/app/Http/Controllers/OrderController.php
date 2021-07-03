<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order(){
        $getorder = Order::orderby('order_id','DESC')->paginate(5);
        return view('back-end.admin.order.manage_order', compact('getorder'));
    }

    public function view_order($order_code){
//        $order_details = OrderDetails::where('order_code', $order_code)->get();
        $getorder = Order::where('order_code',$order_code)->get();
        $order = Order::where('order_code',$order_code)->get();
        foreach ($order as $key => $orders){
            $customer_id = $orders->customer_id;
            $shipping_id = $orders->shipping_id;
            $order_status = $orders->order_status;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_details = OrderDetails::with('product')->where('order_code',$order_code)->get();

        foreach ($order_details as $key => $order_d){
            $product_coupon = $order_d->product_coupon;
        }

        if($product_coupon != 'no'){
            $coupon = Coupon::where('coupon_code',$product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        }else{
            $coupon_condition = 2;
            $coupon_number = 0;
        }

        return view('back-end.admin.order.view_order', compact('order_details', 'customer', 'shipping','coupon_condition','coupon_number','getorder','order_status'));
    }

    public function update_order_qty(Request $request)
    {
        //update order
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();
    }
}
