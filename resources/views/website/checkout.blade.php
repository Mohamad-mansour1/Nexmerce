@extends('website.layouts.app')

@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Checkout</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="checkout-area ptb-100">
        <div class="container">
            <form action="{{ route('order') }}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Full Name <span class="required">*</span></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="note" id="note" cols="30" rows="5" placeholder="Order Notes" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="order-details">
                            <h3 class="title">Your Order</h3>
                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($cartItems as $item)
                                            <tr>
                                                <td class="product-name">
                                                    <a href="#">
                                                        <img style="width: 15%" src="{{ asset($item->product->product_image) }}"
                                                            alt="item">
                                                    </a>
                                                </td>
                                                <td class="product-name">
                                                    <a href="#">{{ $item->product->product_name }}</a>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="input-counter">
                                                        {{ $item->quantity }}
                                                    </div>
                                                </td>
                                                <td class="product-total">
                                                    <span class="subtotal-amount">$
                                                        @if ($item->product->special_price)
                                                            {{ $item->product->special_price }}
                                                        @else
                                                            {{ $item->product->price }}
                                                        @endif
                                                    <span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" class="total-price">
                                                <span>Order Total</span>
                                            </td>
                                            <td colspan="2" class="text-center product-subtotal">
                                                <span class="subtotal-amount">${{ $totalPrice }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="payment-box">
                                <div class="payment-method">
                                    <p>
                                        <input type="radio" id="cash-on-delivery" name="radio-group" checked>
                                        <label for="cash-on-delivery">Cash on Delivery</label>
                                    </p>
                                </div>
                                <button type="submit" class="default-btn">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
