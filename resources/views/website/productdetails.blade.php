@extends('website.layouts.app')



@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $product->product_name }}</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Products Details</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="product-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="products-details-image">
                        <ul class="products-details-image-slides">
                            <li><img src="{{ asset($product->product_image) }}" alt="image"></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="products-details-desc">
                        <h3>{{ $product->product_name }}</h3>
                        <div class="price">
                            @if ($product->special_price)
                                <span class="old-price">${{ $product->price }}</span>
                                <span class="new-price">${{ $product->special_price }}</span>
                            @else
                                <span class="new-price">${{ $product->price }}</span>
                            @endif
                        </div>
                        <ul class="products-info">
                            <li><span>Availability:</span> <a href="#">{{ $product->quantity > 0 ? "In stock ($product->quantity items)" : "Out of stock" }}</a></li>
                        </ul>
                        <div class="products-info-btn products-color-switch">
                            {!! $product->description !!}
                        </div>
                        <div class="products-add-to-cart">
                            <div class="input-counter">
                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                <input type="text"  id="quantity" value="1">
                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                            </div>
                            <button data-product-id="{{ $product->id }}" class="default-btn add-to-cart"><i class="fas fa-cart-plus"></i> Add to
                                Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
