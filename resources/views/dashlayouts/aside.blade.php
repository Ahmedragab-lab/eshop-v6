<!-- main-sidebar -->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar sidebar-scroll">
    <div class="main-sidebar-header active">
        <a class="desktop-logo logo-light active" href="index.html"><img src="{{ asset('dashassets/img/brand/logo.png') }}" class="main-logo" alt="logo"></a>
        <a class="desktop-logo logo-dark active" href="index.html"><img src="{{ asset('dashassets/img/brand/logo-white.png') }}" class="main-logo dark-theme" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-light active" href="index.html"><img src="{{ asset('dashassets/img/brand/favicon.png') }}" class="logo-icon" alt="logo"></a>
        <a class="logo-icon mobile-logo icon-dark active" href="index.html"><img src="{{ asset('dashassets/img/brand/favicon-white.png') }}" class="logo-icon dark-theme" alt="logo"></a>
    </div>
    <div class="main-sidemenu">
        <div class="app-sidebar__user clearfix">
            <div class="dropdown user-pro-body">
                <div class="">
                    <img alt="user-img" class="avatar avatar-xl brround" src="{{ asset('dashassets/img/faces/6.jpg') }}"><span class="avatar-status profile-status bg-green"></span>
                </div>
                <div class="user-info">
                    <h4 class="font-weight-semibold mt-3 mb-0">{{ Auth::user()->name }}</h4>
                    <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                </div>
            </div>
        </div>
        <ul class="side-menu">
            <li class="slide">
                <a class="side-menu__item" href="/"><span class="side-menu__label">Mysite</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.dashboard') }}"><span class="side-menu__label">Home</span></a>
            </li>
            <li class="side-item side-item-category">Component </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.homeslider') }}"><span class="side-menu__label">Manage Home Slider</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.section') }}"><span class="side-menu__label">Sections</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.product') }}"><span class="side-menu__label">Products</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{ route('admin.coupon') }}"><span class="side-menu__label">All Coupons</span></a>
            </li>
            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#"><span class="side-menu__label">test</span><i class="angle fe fe-chevron-down"></i></a>
                <ul class="slide-menu">
                    <li><a class="slide-item" href="chart-morris.html">test1</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
<!-- main-sidebar -->
