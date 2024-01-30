@extends('website.layouts.app')

@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Reset Password</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Reset Password</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="signup-area ptb-100">
        <div class="container">
            <div class="signup-content">
                <h2>Reset Password</h2>
                <form class="signup-form" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label>Email</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus
                            placeholder="Enter your Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>

                            <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="new-password"
                            placeholder="Enter your Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                            name="password_confirmation" required autocomplete="new-password"
                            placeholder="Enter your Confirm Password">
                    </div>
                    <button type="submit" class="default-btn">{{ __('Reset Password') }}</button>
                    <a href="{{ route('index') }}" class="return-store">or Return to Store</a>
                </form>
            </div>
        </div>
    </section>
@endsection
