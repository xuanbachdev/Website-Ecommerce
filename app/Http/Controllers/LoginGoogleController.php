<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginGoogleController extends Controller
{
    //
    public function redirectToProvider()
	{
		return Socialite::driver('google')->redirect();
	}

    public function handleProviderCallback(Request $request)
    {
        $data = Socialite::driver('google')->stateless()->user();
        $customer = Customer::where('customer_email', '=', $data->email)->first();
        if (!$customer) {
            $user = new Customer;
            $user->customer_name = $data->name;
            $user->customer_email = $data->email;
            $user->google_id = $data->id;
            $user->save();

            Session::put('customer_id',$user);
            Session::put('customer_name',$user->customer_name);
        } else {
            Session::put('customer_id',$customer);
            Session::put('customer_name',$customer->customer_name);
        }

        return Redirect::to('/');
    }

}
