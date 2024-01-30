<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">


            <div class="text-center mx-5 "> <img src="{{ asset('assets/img/logo.png') }}" alt=""
                    width="100"></div>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item   {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <!-- Category -->
        <li class="menu-item   {{ request()->is('admin/categories') ? 'active' : '' }}">
            <a href="{{ route('admin.categories.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-category-circle"></i>
                <div data-i18n="Analytics">categories</div>
            </a>
        </li>
        <!-- Products -->
        <li class="menu-item   {{ request()->is('admin/products') ? 'active' : '' }}">
            <a href="{{ route('admin.products.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-products-circle"></i>
                <div data-i18n="Analytics">Products</div>
            </a>
        </li>
        <!-- Orders -->
        <li class="menu-item   {{ request()->is('admin/orders') ? 'active' : '' }}">
            <a href="{{ route('admin.orders.index') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-orders-circle"></i>
                <div data-i18n="Analytics">Orders</div>
            </a>
        </li>


    </ul>
</aside>
