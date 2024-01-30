@extends('website.layouts.app')



@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Account</h2>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li>Account</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="cart-area ptb-100">
        <div class="container">
            <div class="col-sm-12">
                <h3 class="account-title">my account</h3>
            </div>
            <div class="row align-items-start">
                <div class="col-sm-3 p-0 nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-account-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-address"
                        aria-selected="false"><i class="bx bxs-user-account"></i>Account Details</button>
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i
                            class="bx bxs-log-out"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
                <div class="col-sm-9 tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-account" role="tabpanel"
                        aria-labelledby="v-pills-account-tab">
                        <div class="myaccount-content">
                            <h3>Account Details</h3>

                            <div class="account-details-form">
                                <form action="{{ route('account.update') }}" method="post">
                                @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-12 mb-30">
                                            <input id="name" name="name" placeholder=" Name" value="{{ $user->name }}"
                                                class="form-control @error('name') is-invalid @enderror" type="text">
                                                {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="email" name="email" placeholder="Email Address" value="{{ $user->email }}"
                                                class="form-control @error('email') is-invalid @enderror" type="email">
                                                {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                                        </div>

                                        <div class="col-12 mb-30">
                                            <input id="current_password" name="current_password" placeholder="Current Password" class="form-control @error('current_password') is-invalid @enderror"
                                                type="password">
                                                {!! $errors->first('current_password', "<span class='text-danger'>:message</span>") !!}
                                                @if (session('current_password'))
                                                    <span class="text-danger">
                                                        {{ session('current_password') }}
                                                    </span>
                                                @endif
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="password" name="password" placeholder="New Password" class="form-control"
                                                type="password">
                                            {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                                        </div>

                                        <div class="col-lg-6 col-12 mb-30">
                                            <input id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control"
                                                type="password">
                                        </div>

                                        <div class="col-12">
                                            <button class="default-btn">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
