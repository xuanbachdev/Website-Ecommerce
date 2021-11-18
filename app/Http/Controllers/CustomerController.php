<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomerController extends Controller
{

    private $customer;
    public function __construct(Customer $customer){
        $this->customer = $customer;
    }

    public function login_checkout(){
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        return view('front-end.auth.login', compact('categorysLimit', ));
    }

    public function customer_register(){
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        return view('front-end.auth.register', compact('categorysLimit'));
    }

    public function store(Request $request){

        $this->validate($request, [
           'customer_name' => 'bail|required|unique:customers',
           'gioitinh' => 'required',
           'customer_phone' => 'required',
           'customer_address' => 'required',
           'customer_email' => 'required|unique:customers|email',
           'customer_password' => 'required',
        ],[
            "customer_name.required" => "Tên không được để trống",
            "customer_name.unique" => "Tên đã tồn tại",
            "gioitinh.required" => "Hãy chọn giới tính",
            "customer_address.required" => "Địa chỉ không được để trống",
            "customer_phone.required" => "Số điện thoại không được để trống",
            "customer_email.required" => "Tài khoản không được để trống",
            "customer_email.unique" => "Email đã tồn tại",
            "customer_password.required" => "Mật khẩu không được để trống"
        ]);

        $data =[
        'customer_name' => $request->customer_name,
        'gender' => $request->gioitinh,
        'customer_phone' => $request->customer_phone,
        'customer_address' => $request->customer_address,
        'customer_email' => $request->customer_email,
        'customer_password' => md5($request->customer_password),
        ];


        $customer_id = $this->customer->create($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/');
    }

    public function checkout(){
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        return view('front-end.checkout.show_checkout', compact('categorysLimit'));
    }

    public function save_checkout_customer(Request $request ){
        $shipping_data = array();
        $shipping_data['shipping_name'] = $request->shipping_name;
        $shipping_data['shipping_email'] = $request->shipping_email;
        $shipping_data['shipping_phone'] = $request->shipping_phone;
        $shipping_data['shipping_address'] = $request->shipping_address;
        $shipping_data['shipping_notes'] = $request->shipping_notes;

        $shipping_id = DB::table('shipping')->insertGetId($shipping_data);

        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }

    public function customer_login(Request $request ){
        $remember = $request->get('remember_me') ? true : false;
//        $token_random = Str::random();
        $this->validate($request, [
            'email_account'=>'bail|required|email',
            'password_account'=>'bail|required'
        ], [
            'email_account.required'=>'Bạn chưa nhập Usernane',
            'password_account.required'=>'Bạn chưa nhập Password'
        ]);



        $email = $request->email_account;
        $password = md5($request->password_account);
        $result = DB::table('customers')->where('customer_email',$email)->where('customer_password',$password)->first();
//        $customer_token = $result->remember_token;
//        if(Session::get('coupon')==true){
//            Session::forget('coupon');
//        }
//
        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_name',$result->customer_name);
            return Redirect::to('/');
        }else{
            return Redirect::to('/login')->with('message', 'Username/Password bị sai. Vui lòng nhập lại');
        }
        Session::save();



    }

    public function customer_logout(){
            Session::flush();
            return Redirect::to('/login');
    }

    public function getProfile(){
        $categorysLimit = Category::where('parent_id', 0)->take(20)->get();
        return view('front-end.user.profile', compact('categorysLimit'));
    }

}
