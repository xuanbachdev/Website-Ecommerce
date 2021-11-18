<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CouponController extends Controller
{
//    use DeleteModelTrait;
//    private $coupon;
//    public function __construct(Coupon $coupon)
//    {
//        $this->coupon = $coupon;
//    }

    public function delete_coupon($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message', 'Xoá mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }
    public function insert_coupon(Request $request){
        return view('back-end.admin.coupon.insert_coupon');
    }

    public function list_coupon(){
        $coupon = Coupon::orderby('coupon_id', 'DESC')->latest()->paginate(5);
        return view('back-end.admin.coupon.list_coupon', compact('coupon'));
    }

    public function insert_coupon_code(Request $request){
        $data = $request->all();
        $coupon = new Coupon();

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();

        Session::put('message', 'Thêm mã giảm giá thành công');

        return Redirect::to('/list-coupon');
    }

    public function unset_coupon(){
        $coupon = Session::get('coupon');
        if($coupon==true){
            // Session::destroy();
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
    }
}
