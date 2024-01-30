@extends('admin.layouts.app')


@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">
            <a href="{{ route('admin.admin.account') }}">
                Home /
            </a>
        </span> Profile
    </h4>
    <div id="success_message"></div>
    <form action="{{ Route('admin.admin.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3 p-3">
            <div class="table-responsive text-nowrap">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="title" class="form-label">Name<span class="text-error"></span></label>
                            <input class="form-control name" type="text" id="name" name="name"
                                value="{{ $user->name }}">
                            {!! $errors->first('name', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="title" class="form-label">Email<span class="text-error"></span></label>
                            <input class="form-control email" type="text" id="email" name="email"
                                value="{{ $user->email }}">
                            {!! $errors->first('email', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 p-3">
            <div class="card-header">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Change Password</h5>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="password" class="form-label">Password<span class="text-error"></span></label>
                            <input class="form-control" type="password" id="password"
                                name="password">
                            {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="password" class="form-label">Confirm Password<span class="text-error"></span></label>
                            <input class="form-control" type="password"
                                id="confirm_password" name="confirm_password">
                            {!! $errors->first('password', "<span class='text-danger'>:message</span>") !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 p-3">
            <div class="card-header">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-0">Current Password</h5>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <div class="container">
                    <div class="row g-2">
                        <div class="col-12 mb-2">
                            <label for="current_password" class="form-label">Current Password<span class="text-error"></span></label>
                            <input class="form-control" type="password"
                                id="current_password" name="current_password">
                            {!! $errors->first('current_password', "<span class='text-danger'>:message</span>") !!}
                            
                            @if (session('current_password'))
                                <span class="text-danger">
                                    {{ session('current_password') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-12 mb-2 d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                <span class="flex-center text-white ">Save</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
