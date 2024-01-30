@extends('website.layouts.app')

@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Cart</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="cart-area ptb-100">
        <div class="container">
            @if (count($cartItems) > 0)
                <form>
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                @auth
                                    @foreach ($cartItems as $item)
                                        <tr data-product-id="{{ $item->product->id }}">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset($item->product->product_image) }}" alt="item">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">
                                                    {{ $item->product->product_name }}
                                                </a>
                                            </td>
                                            <td class="unit-amount">
                                                <span class="unit-amount">$
                                                    @if ($item->product->special_price)
                                                        {{ $item->product->special_price }}
                                                    @else
                                                        {{ $item->product->price }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-counter">
                                                    {{ $item->quantity }}
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span
                                                    class="subtotal-amount">$
                                                    @if ($item->product->special_price)
                                                        {{ $item->product->special_price * $item->quantity }}
                                                    @else
                                                        {{ $item->product->price * $item->quantity }}
                                                    @endif
                                                </span>

                                                <a data-product-id="{{ $item->product_id }}" class="remove remove-form"><i
                                                        class='bx bx-trash'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($products as $product)
                                        <tr data-product-id="{{ $product->id }}">
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="{{ asset($product->product_image) }}" alt="item">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#">
                                                    {{ $product->product_name }}
                                                </a>
                                            </td>
                                            <td class="unit-amount">
                                                <span class="unit-amount">$
                                                    @if ($product->special_price)
                                                        {{ $product->special_price }}
                                                    @else
                                                        {{ $product->price }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="input-counter">
                                                    @if (array_key_exists($product->id, $cartItems))
                                                        {{ $cartItems[$product->id] }}
                                                    @else
                                                        0
                                                    @endif
                                                    {{-- {{ $quantity }} --}}
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span
                                                    class="subtotal-amount">
                                                    @if (array_key_exists($product->id, $cartItems))
                                                        <span class="subtotal-amount">$
                                                            @if ($product->special_price)
                                                                {{ $product->special_price * $cartItems[$product->id] }}
                                                            @else
                                                                {{ $product->price * $cartItems[$product->id] }}
                                                            @endif
                                                        </span>
                                                    @else
                                                        <span class="subtotal-amount">$0</span>
                                                    @endif</span>

                                                <a data-product-id="{{ $product->id }}" class="remove remove-form"><i
                                                        class='bx bx-trash'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endauth
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-buttons">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-sm-7 col-md-7">
                                <a href="{{ route('index') }}" class="optional-btn">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                    <div class="cart-totals">
                        <a href="{{ route('checkout') }}" class="default-btn">Proceed to Checkout</a>
                    </div>
                </form>
            @else
                <h3 class="text-center">Your cart is empty.</h3>
            @endif
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {});
    </script>
@endsection
