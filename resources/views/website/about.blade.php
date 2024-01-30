@extends('website.layouts.app')



@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>About Us</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="about-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{ asset('images/about/img1.webp') }}" class="shadow" alt="image">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <span class="sub-title">About Us</span>
                        <h2>Xton Trusted Online Shopping Site in the World</h2>
                        <h6>Xton.com offers you flexible and responsive shopping experience.</h6>
                        <p><strong>Xton</strong> is an eCommerce website which features millions of products, i.e.
                            clothes, shoes, bags, electronic items and much more, with all at incredible prices.</p>
                        <p>One of the most popular on the web is shopping. Lorem ipsum dolor sit amet, consectetur
                            adipiscing elit.</p>
                        <div class="features-text">
                            <h5><i class='bx bx-planet'></i>Ships to more than 10 countries and regions</h5>
                            <p>We provide customers with a hassle-free and worry-free international shopping experience
                                from buying to delivery.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-inner-area">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="about-text">
                            <h3>Our Story</h3>
                            <p>One of the most popular on the web is shopping.</p>
                            <ul class="features-list">
                                <li><i class='bx bx-check'></i> People like Xton</li>
                                <li><i class='bx bx-check'></i> World's finest Xton</li>
                                <li><i class='bx bx-check'></i> The original Xton</li>
                                <li><i class='bx bx-check'></i> We trust Xton</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="about-text">
                            <h3>Our Values</h3>
                            <p>The best of both worlds. Store and web.</p>
                            <ul class="features-list">
                                <li><i class='bx bx-check'></i> Always in style!</li>
                                <li><i class='bx bx-check'></i> Discover your favorite shopping</li>
                                <li><i class='bx bx-check'></i> Find yourself</li>
                                <li><i class='bx bx-check'></i> Feel-good shopping</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                        <div class="about-text">
                            <h3>Our Promise</h3>
                            <p>Rediscover a great shopping tradition</p>
                            <ul class="features-list">
                                <li><i class='bx bx-check'></i> Get better shopping</li>
                                <li><i class='bx bx-check'></i> Love shopping again</li>
                                <li><i class='bx bx-check'></i> Online shopping.</li>
                                <li><i class='bx bx-check'></i> Shopping for all seasons</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
