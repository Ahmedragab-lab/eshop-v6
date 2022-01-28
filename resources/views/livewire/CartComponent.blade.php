<div>
   <!--main area-->
	<main id="main" class="main-site">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">home</a></li>
					<li class="item-link"><span>cart</span></li>
				</ul>
			</div>
			<div class=" main-content-area">
				<div class="wrap-iten-in-cart">
                    @if(Session::has('success_message'))
                        <div class="alert alert-success">
                            <strong>Success </strong> {{ Session::get('success_message') }}
                        </div>
                    @endif
                    @if(Cart::instance('cart')->count() > 0)
                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach(Cart::instance('cart')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->product_name }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('product.details',$item->model->slug) }}">{{ $item->model->product_name }}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">${{ $item->model->original_price }}</p></div>
                                    <div class="quantity">
                                        <div class="quantity-input">
                                            <input type="text"  onkeydown="return false" min="1" max="{{ $item->model->qty }}" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" >
                                            <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuntity('{{ $item->rowId }}')"></a>
                                            <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuntity('{{ $item->rowId }}')"></a>
                                        </div>
                                        <p class="text-center">
                                            <a href="#" wire:click.prevent='SaveForLater("{{ $item->rowId }}")'>Save For Later</a>
                                        </p>
                                    </div>
                                    <div class="price-field sub-total"><p class="price">${{ $item->subtotal }}</p></div>
                                    <div class="delete">
                                        <a href="#" wire:click.prevent="destroy('{{ $item->rowId }}')" class="btn btn-delete" title="">
                                            <span>Delete from your cart</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                       <p>No item in cart</p>
                    @endif
				</div>

				<div class="summary">
					<div class="order-summary">
						<h4 class="title-box">Order Summary</h4>
						<p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ Cart::subtotal() }}</b></p>
						<p class="summary-info"><span class="title">Tax</span><b class="index">${{ Cart::tax() }}</b></p>
						<p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
						<p class="summary-info total-info "><span class="title">Total</span><b class="index">${{ Cart::total() }}</b></p>
					</div>
					<div class="checkout-info">
						<label class="checkbox-field">
							<input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
						</label>
						<a class="btn btn-checkout" href="checkout.html">Check out</a>
						<a class="link-to-shop" href="shop.html">Continue Shopping<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
					</div>
					<div class="update-clear">
						<a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()" >
                            Clear Shopping Cart
                        </a>
						<a class="btn btn-update" href="#">Update Shopping Cart</a>
					</div>
				</div>
                {{-- save for later   --}}
                <div class="wrap-iten-in-cart ">
                    <h3 class="title-box"
                        style="border-bottom: 1px solid; padding: 13px 18px; background-color: #ff2832; color: #fefefe; text-transform: uppercase; font-size: 14px; line-height: 14px;">
                         {{ Cart::instance('saveforlater')->count() }} Item(s) Saved For Later
                    </h3>
                    @if(Session::has('s_success_message'))
                        <div class="alert alert-success">
                            <strong>Success </strong> {{ Session::get('s_success_message') }}
                        </div>
                    @endif
                    @if(Cart::instance('saveforlater')->count() > 0)
                        <h3 class="box-title">Products Name</h3>
                        <ul class="products-cart">
                            @foreach(Cart::instance('saveforlater')->content() as $item)
                                <li class="pr-cart-item">
                                    <div class="product-image">
                                        <figure><img src="{{ asset('assets/images/products') }}/{{ $item->model->image }}" alt="{{ $item->model->product_name }}"></figure>
                                    </div>
                                    <div class="product-name">
                                        <a class="link-to-product" href="{{ route('product.details',$item->model->slug) }}">{{ $item->model->product_name }}</a>
                                    </div>
                                    <div class="price-field produtc-price"><p class="price">${{ $item->model->original_price }}</p></div>
                                    <div class="quantity">
                                        {{-- <div class="quantity-input">
                                            <input type="text"  onkeydown="return false" min="1" max="{{ $item->model->qty }}" name="product-quatity" value="{{ $item->qty }}" data-max="120" pattern="[0-9]*" >
                                            <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuntity('{{ $item->rowId }}')"></a>
                                            <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuntity('{{ $item->rowId }}')"></a>
                                        </div> --}}
                                        <p class="text-center">
                                            <a href="#" wire:click.prevent=' moveProductFromSaveForLaterToCart("{{ $item->rowId }}")'>Add to cart</a>
                                        </p>
                                    </div>
                                    {{-- <div class="price-field sub-total"><p class="price">${{ $item->subtotal }}</p></div> --}}
                                    <div class="delete">
                                        <a href="#" wire:click.prevent="DeleteFromSaveForLater('{{ $item->rowId }}')" class="btn btn-delete" title="">
                                            <span>Delete from saved later</span>
                                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                       <p>No item in save for later</p>
                    @endif
				</div>
                {{-- End save for later   --}}
                {{-- product slider --}}
				<div class="wrap-show-advance-info-box style-1 box-in-site">
					<h3 class="title-box">Most Viewed Products</h3>
					<div class="wrap-products">
						<div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}' >
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
					</div><!--End wrap-products-->
				</div>
                {{-- end product slider --}}
			</div><!--end main content area-->
		</div><!--end container-->

	</main>
	<!--main area-->
</div>
