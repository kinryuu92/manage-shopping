<?php

namespace App\Http\Controllers\FrontEnd;


use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;


class LoginRegisterController extends Controller
{
    public function index()
    {
        return view('frontEnd.contact.login_register');
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallBack()
    {
        $customer = Socialite::driver('google')->user();
        $this->registerOrLoginCustomer($customer);
        return redirect()->route('/login_register.index');
    }

    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallBack()
    {
        $customer = Socialite::driver('facebook')->user();
        $this->registerOrLoginCustomer($customer);
        return redirect()->route('/login_register.index');
    }

    protected function registerOrLoginCustomer($data)
    {
        $customer = Customer::where('email', $data->email)->first();
        if (!$customer) {
            $customer = new Customer();
            $customer->name = $data->name;
            $customer->email = $data->email;
            $customer->provider_id = $data->provider_id;
            $customer->avatar = $data->avatar;
            $customer->phone = $data->phone;
            $customer->save();
        }
        Auth::login($customer);
    }



//    public function login_facebook()
//    {
//        config(['services.facebook.redirect' => env('FACEBOOK_REDIRECT')]);
//        return Socialite::driver('facebook')->redirect();
//    }
//
//    public function callback_facebook()
//    {
//        config(['services.facebook.redirect' => env('FACEBOOK_REDIRECT')]);
//        $provider = Socialite::driver('facebook')->user();
//        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
//        if ($account != NULL) {
//            $account_name = Customer::where('id', $account->id)->first();
//            Session::put('id', $account_name->id);
//            Session::put('name', $account_name->name);
//            return redirect('/login-register')->with('message', 'Đăng nhập bằng tài khoản facebook'
//                . $account_name->email . ' thành công ');
//        } elseif ($account == NULL) {
//            $customer_login = new Social([
//                'provider_user_id' => $provider->getId(),
//                'provider_user_email' => $provider->getEmail(),
//                'provider' => 'facebook'
//            ]);
//            $customer = Customer::where('email', $provider->getEmail())->first();
//            if (!$customer) {
//                $customer = Customer::create([
//                   'name' => $provider->getName(),
//                   'email' => $provider->getEmail(),
//                   'password' => ''
//                ]);
//            }
//            $customer_login->customer()->associate($customer);
//            $customer_login->save();
//
//            $account_new = Customer::where('id', $customer_login->id)->first();
//            Session::put('id', $account_new->id);
//            Session::put('name', $account_new->name);
//            return redirect('/login-register')->with('message', 'Đăng nhập bằng tài khoản facebook'
//                . $account_new->email . ' thành công ');
//        }
//    }


}
