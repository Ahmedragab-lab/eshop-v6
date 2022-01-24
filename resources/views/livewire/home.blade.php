<div>
    <main id="main">
        <div class="container">

            <!--Home SLIDER thank you wolf-->
            <div class="wrap-main-slide">
                <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                    @foreach(\App\Models\HomeSlider::where('status',1)->limit(3)->get() as $slider)
                        <div class="item-slide">
                            <img src="{{ asset('assets/images/sliders') }}/{{ $slider->image }}" alt="" class="img-slide">
                            <div class="slide-info slide-1">
                                <h2 class="f-title"><b style="color: #fff">{{ $slider->title }}</b></h2>
                                <span class="subtitle" style="color: #fff">{{ $slider->subtitle }}</span>
                                <p class="sale-info" style="color: #fff">Only price: <span class="price">${{ $slider->price }}</span></p>
                                <a href="{{ $slider->link }}" class="btn-link">Shop Now</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!--BANNER-->
            <div class="wrap-banner style-twin-default">
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="assets/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
                    </a>
                </div>
                <div class="banner-item">
                    <a href="#" class="link-banner banner-effect-1">
                        <figure><img src="assets/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
                    </a>
                </div>
            </div>

            <!--On Sale-->
            <div class="wrap-show-advance-info-box style-1 has-countdown">
                <h3 class="title-box">On Sale</h3>
                <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                    @foreach (\App\Models\Product::where('selling_price','>',0)->inRandomOrder()->get()->take(8) as $product)
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product.details',$product->slug) }}" title="{{ $product->product_name }}">
                                    <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="800" height="800" alt="{{ $product->product_name }}"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="{{ route('product.details',$product->slug) }}" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="{{ route('product.details',$product->slug) }}" class="product-name"><span>{{ $product->product_name }}</span></a>
                                <div class="wrap-price"><span class="product-price" style="color: rgb(190, 35, 35);"><s>${{ $product->original_price }}</s></span></div>
                                <div class="wrap-price"><span class="product-price" style="font-size:19px;">${{ $product->selling_price }}</span></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!--Latest Products-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Latest Products</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="assets/images/digital-electronic-banner.jpg" width="1170" height="240" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="digital_1a">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    @foreach (\App\Models\Product::latest()->limit(10)->get() as $product)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product.details',$product->slug) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                                <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="800" height="800" alt="{{ $product->product_name }}"></figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{ route('product.details',$product->slug) }}" class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product.details',$product->slug) }}" class="product-name"><span>{{ $product->product_name }}</span></a>
                                            <div class="wrap-price"><span class="product-price" style="color: rgb(190, 35, 35);">${{ $product->original_price }}</span></div>
                                            {{-- <div class="wrap-price"><span class="product-price" style="font-size:19px;">${{ $product->selling_price }}</span></div> --}}
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--Product Categories-->
            <div class="wrap-show-advance-info-box style-1">
                <h3 class="title-box">Product Categories</h3>
                <div class="wrap-top-banner">
                    <a href="#" class="link-banner banner-effect-2">
                        <figure><img src="assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
                    </a>
                </div>
                <div class="wrap-products">
                    <div class="wrap-product-tab tab-style-1">
                        <div class="tab-control">
                            @foreach (\App\Models\Section::orderByDesc('id')->limit(6)->get() as $key => $section)
                            <a href="#cat{{ $section->id }}" class="tab-control-item {{ $key==0 ? 'active' : ''}} ">{!! $section->section_name !!}</a>
                            @endforeach
                        </div>
                        <div class="tab-contents">
                            @foreach (\App\Models\Section::orderByDesc('id')->limit(6)->get() as $key => $section)
                                <div class="tab-content-item {{ $key==0 ? 'active' : ''}}" id="cat{{ $section->id }}">
                                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                        @foreach ( $section->products as $product)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="{{ route('product.details',$product->slug) }}" title="{{ $product->product_name }}">
                                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $product->image }}" width="800" height="800" alt="{{ $product->product_name }}"></figure>
                                                    </a>
                                                    <div class="group-flash">
                                                        <span class="flash-item new-label">new</span>
                                                    </div>
                                                    <div class="wrap-btn">
                                                        <a href="{{ route('product.details',$product->slug) }}" class="function-link">quick view</a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <a href="{{ route('product.details',$product->slug) }}" class="product-name"><span>{{ $product->product_name }}</span></a>
                                                    <div class="wrap-price"><span class="product-price" style="color: rgb(190, 35, 35);">${{ $product->original_price }}</span></div>
                                                    {{-- <div class="wrap-price"><span class="product-price" style="font-size:19px;">${{ $product->selling_price }}</span></div> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
</div>
