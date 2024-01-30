@extends('website.layouts.app')



@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ $category->name }}</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Products</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="products-area pt-100 pb-70">
        <div class="container">

            @if ($products->isNotEmpty())
                <div class="products-filter-options">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <div class="d-lg-flex d-md-flex align-items-center">
                                <span class="sub-title d-none d-lg-block d-md-block">View:</span>
                                <div class="view-list-row d-none d-lg-block d-md-block">
                                    <div class="view-column">
                                        <a href="#" class="icon-view-two">
                                            <span></span>
                                            <span></span>
                                        </a>
                                        <a href="#" class="icon-view-three active">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                        <a href="#" class="icon-view-four">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                        <a href="#" class="view-grid-switch">
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <p>Showing 1 – {{ count($products) }} of {{ count($products) }}</p>
                        </div>
                    </div>
                </div>
                <div id="products-collections-filter" class="row">

                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 products-col-item">
                            <div class="single-products-box">
                                <div class="products-image">
                                    <a href="{{ route('productdetails', $product->product_slug) }}">
                                        <img style="height:460px;" src="{{ asset($product->product_image) }}" class="main-image"
                                            alt="{{ $product->product_image }}">
                                        <img style="height:460px;" src="{{ asset($product->product_image) }}" class="hover-image"
                                            alt="{{ $product->product_image }}">
                                    </a>
                                </div>
                                <div class="products-content">
                                    <h3><a href="{{ route('productdetails', $product->product_slug) }}">{{ $product->product_name }}</a></h3>
                                    <div class="price">
                                        @if ($product->special_price)
                                            <span class="old-price">${{ $product->price }}</span>
                                            <span class="new-price">${{ $product->special_price }}</span>
                                        @else
                                            <span class="new-price">${{ $product->price }}</span>
                                        @endif
                                    </div>
                                    <button data-product-id="{{ $product->id }}" class="add-to-cart cart-background">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{ $products->links('website.paginations.index') }}
            @else
                <div id="products-collections-filter" class="row">
                    <h3 class="text-center">No Product Found</h3>
                </div>
            @endif
        </div>
    </section>
@endsection
