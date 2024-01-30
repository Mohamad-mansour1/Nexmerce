@extends('website.layouts.app')



@section('content')

    <div class="home-slides owl-carousel owl-theme">
        <div class="main-banner" style="background-image: url(images/slides/img8.webp)">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="main-banner-content text-white">
                                    <h1>Winter-Spring 2021!</h1>
                                    <div class="btn-box">
                                        <a href="#" class="optional-btn">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-banner" style="background-image: url(images/slides/img6.webp)">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-md-12">
                                <div class="main-banner-content text-white">
                                    <h1>Winter-Spring 2021!</h1>
                                    <div class="btn-box">
                                        <a href="#" class="optional-btn">More Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="all-products-area ptb-100 bg-f5f5f5">
        <div class="container">

            @if ($product_new->isNotEmpty())
                <section class="products-area pt-100 pb-70">
                    <div class="container">
                        <div class="section-title text-start">
                            <span class="sub-title">See Our Collection</span>
                            <h2>New Products</h2>
                        </div>
                        <div class="products-slides owl-carousel owl-theme">
                            @foreach ($product_new as $new)
                                <div class="single-products-box">
                                    <div class="products-image">
                                        <a href="{{ route('productdetails', $new->product_slug) }}">
                                            <img style="height: 230px;" src="{{ asset($new->product_image) }}" class="main-image" alt="image">
                                            <img style="height: 230px;" src="{{ asset($new->product_image) }}" class="hover-image" alt="image">
                                        </a>
                                    </div>
                                    <div class="products-content">
                                        <h3><a href="{{ route('productdetails', $new->product_slug) }}">{{ $new->product_name }}</a></h3>
                                        <div class="price">
                                            @if ($new->special_price)
                                                <span class="old-price">${{ $new->price }}</span>
                                                <span class="new-price">${{ $new->special_price }}</span>
                                            @else
                                                <span class="new-price">${{ $new->price }}</span>
                                            @endif
                                        </div>
                                        <button data-product-id="{{ $new->id }}" class="add-to-cart cart-background">Add to Cart</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif

            <section class="categories-banner-area pt-100 pb-70">
                <div class="container">
                    <div class="section-title text-start">
                        <span class="sub-title">See Our Collection</span>
                        <h2>Shop By Categories</h2>
                    </div>
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="single-categories-box">
                                    <img src="{{ asset($category->logo) }}" alt="image">
                                    <div class="content text-white">
                                        <h3 style="padding-bottom: 25px">{{ $category->name }}</h3>
                                    </div>
                                    <a href="{{ route('products', $category->slug) }}" class="link-btn"></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>


            @if ($product_featured->isNotEmpty())
                <section class="products-area pt-100 pb-70">
                    <div class="container">
                        <div class="section-title text-start">
                            <span class="sub-title">See Our Collection</span>
                            <h2>Featured Products</h2>
                        </div>
                        <div class="products-slides owl-carousel owl-theme">

                            @foreach ($product_featured as $featured)
                                <div class="single-products-box">
                                    <div class="products-image">
                                        <a href="{{ route('productdetails', $featured->product_slug) }}">
                                            <img style="height: 230px;"  src="{{ asset($featured->product_image) }}" class="main-image"
                                                alt="image">
                                            <img style="height: 230px;"  src="{{ asset($featured->product_image) }}" class="hover-image"
                                                alt="image">
                                        </a>
                                    </div>
                                    <div class="products-content">
                                        <h3><a href="{{ route('productdetails', $featured->product_slug) }}">{{ $featured->product_name }}</a></h3>
                                        <div class="price">
                                            @if ($featured->special_price)
                                                <span class="old-price">${{ $featured->price }}</span>
                                                <span class="new-price">${{ $featured->special_price }}</span>
                                            @else
                                                <span class="new-price">${{ $featured->price }}</span>
                                            @endif
                                        </div>
                                        <button data-product-id="{{ $featured->id }}" class="add-to-cart cart-background">Add to Cart</button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @endif
        </div>
    </section>
@endsection
