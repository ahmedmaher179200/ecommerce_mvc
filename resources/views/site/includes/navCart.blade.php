<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
            <span class="mtext-103 cl2">
                Your Cart
            </span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>
        @if (session()->has('cartItems'))
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full nav-cart-box">
                    @foreach (session()->get('cartItems') as $cartItem)
                        <li class="header-cart-item flex-w flex-t m-b-12 {{'product-' . $cartItem['id']}}">
                            <div class="header-cart-item-img remove-from-cart" data-product_id="{{$cartItem['id']}}">
                                <img src="{{url('public/uploads/products/' . $cartItem['iamge'])}}" alt="IMG">
                            </div>

                            <div class="header-cart-item-txt p-t-8">
                                <a href="{{url('productDetails/' . $cartItem['id'])}}" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                    {{$cartItem['name']}}
                                </a>

                                <span class="header-cart-item-info">
                                    <span class="{{'quantity-' . $cartItem['id']}}">{{$cartItem['quantity']}}</span> x ${{$cartItem['price'] - $cartItem['discount']['value']}}
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
                
                <div class="w-full">
                    <?php 
                        $totle_price = array_sum(array_map(function($item) { 
                            return ($item['price'] - $item['discount']['value']) * $item['quantity']; 
                        }, session()->get('cartItems')));
                    ?>
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $<span class="totle_price">{{$totle_price}}</span>
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{url('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{url('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    ther are no item
                </ul>
                
                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $0
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{url('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{url('cart')}}" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        @endif
        
    </div>
</div>