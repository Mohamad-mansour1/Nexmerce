<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <ul class="header-contact-info">
                    <li>E-commerce</li>
                    <li>Call: <a href="tel:+96171039605">+96171039605</a></li>
                </ul>
            </div>
            <div class="col-lg-6 col-md-12">
                <ul class="header-top-menu">
                    @auth
                        <li><a href="{{ route('account') }}"><i class='bx bxs-user'></i> My Account</a></li>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}"><i class='bx bx-log-in'></i> Login</a></li>
                    @endauth
                </ul>
                <ul class="header-top-others-option">
                    <div class="option-item">
                        <div class="search-btn-box">
                            <i class="search-btn bx bx-search-alt"></i>
                        </div>
                    </div>
                    <div class="option-item">
                        <div class="cart-btn">
                            <a href="{{ route('cart') }}"><i
                                    class='bx bx-shopping-bag'></i></a>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </div>
</div>
