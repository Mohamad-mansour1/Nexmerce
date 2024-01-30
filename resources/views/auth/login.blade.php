@extends('website.layouts.app')

@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Login</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="login-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="login-content">
                        <h2>Login</h2>
                        <form class="login-form" action="{{ route('login') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email"  placeholder="Username or email address" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="default-btn">Login</button>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-password">Lost your password?</a>
                            @endif
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="new-customer-content">
                        <h2>New Customer</h2>
                        <span>Create A Account</span>
                        <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be
                            able to order from our shop. To start shopping click register.</p>
                        <a href="{{ route('register') }}" class="optional-btn">Create A Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
