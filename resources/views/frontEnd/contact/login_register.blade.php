@extends('frontEnd.layouts.master')
@section('css')
    <link href="{{ asset('front_end/login/login.css') }}" rel="stylesheet"/>
@endsection
@section('content')

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form action="#">
                            <input type="text" placeholder="Name"/>
                            <input type="email" placeholder="Email Address"/>
                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                            <button type="submit" class="btn btn-default">Login</button>
                        </form>

                        <ul class="list-login">
                            <li>
                                <a href="{{ route('login.facebook') }}">
                                    <img width="10%" src="{{ asset('eshopper/images/shop/icon_facebook.png') }}" alt="">
                                </a>
                            </li>
                            <li >
                                <a href="{{ route('login.google') }}">
                                    <img width="10%" src="{{ asset('eshopper/images/shop/icon_google.png') }}" alt="">
                                </a>
                            </li>
                        </ul>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">OR</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form action="#">
                            <input type="text" placeholder="Name"/>
                            <input type="email" placeholder="Email Address"/>
                            <input type="password" placeholder="Password"/>
                            <button type="submit" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

@endsection
