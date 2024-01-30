<div class="navbar-area">
    <div class="xton-responsive-nav">
        <div class="container">
            <div class="xton-responsive-menu">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" class="main-logo" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="xton-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('index') }}" style="width:20%;">
                    <img src="{{ asset('assets/img/logo.png') }}" style="width:100%;" class="main-logo" alt="logo">
                </a>
                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a href="{{ route('index') }}" class="nav-link active">Home</a>
                        <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item megamenu"><a href="#" class="nav-link">Shop
                                <i class='bx bx-chevron-down'></i></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <div class="container">
                                        @foreach ($categories->chunk(3) as $chunk)
                                            <div class="row">
                                                @foreach ($chunk as $category)
                                                    <div class="col">
                                                        <h6 class="submenu-title"><a
                                                                href="{{ route('products', $category->slug) }}">{{ $category->name }}</a>
                                                        </h6>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endforeach
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact Us</a>
                    </ul>
                    <div class="others-option">
                        <div class="option-item">
                            <div class="search-btn-box">
                                <i class="search-btn bx bx-search-alt"></i>
                            </div>
                        </div>
                        <div class="option-item">
                            <div class="cart-btn">
                                <a href="{{ route('cart') }}"><i
                                        class='bx bx-shopping-bag'></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>




<div class="search-overlay">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-layer"></div>
            <div class="search-overlay-close">
                <span class="search-overlay-close-line"></span>
                <span class="search-overlay-close-line"></span>
            </div>
            <div class="search-overlay-form">
                <form>
                    <input type="text" class="input-search" placeholder="Search here...">
                    <button type="submit"><i class='bx bx-search-alt'></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
