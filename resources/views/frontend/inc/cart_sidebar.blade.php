@auth('web')
    <div class="offcanvas offcanvas-end" tabindex="-1" id="drawer-cart">
        <div class="offcanvas-header border-btm-black">
            <h5 class="cart-drawer-heading text_16">Your Cart ({{ $user_carts->count() }})</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
            @if ($user_carts->count() > 0)
                <div class="cart-content-area d-flex justify-content-between flex-column">
                    <div class="minicart-loop custom-scrollbar">
                        <!-- minicart item -->
                        @php
                            $subTotal = 0;
                        @endphp
                        @foreach ($user_carts as $user_cart)
                            @php
                                $total_quantity_price = $user_cart->quantity * $user_cart->Product?->discount_price;
                            @endphp
                            @php
                                $subTotal = $subTotal + $total_quantity_price;
                            @endphp
                            <div class="cart-item minicart-item d-flex" data-item-id="{{ $user_cart->id }}">
                                <div class="mini-img-wrapper">
                                    <img class="mini-img" src="{{ asset($user_cart->Product?->thumbnail) }}" alt="img">
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title"><a
                                            href="#">{{ Str::limit($user_cart->Product?->name, 20) }}</a></h2>
                                    <p class="product-vendor">{{ $user_cart->Size?->name }} / {{ $user_cart->Color?->name }}
                                    </p>
                                    <div class="misc d-flex align-items-end justify-content-between">
                                        <div class="product-remove-area d-flex flex-column align-items-end">
                                            <div class="product-price">&#2547; {{ $user_cart->Product?->discount_price }} X
                                                {{ $user_cart->quantity }} = {{ $total_quantity_price }}</div>
                                        </div>
                                    </div>
                                    <button class="delete-item product-remove"
                                                id="remove-cart-product">Remove</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="minicart-footer">
                        <div class="minicart-calc-area">
                            <div class="minicart-calc d-flex align-items-center justify-content-between">
                                <span class="cart-subtotal mb-0">Subtotal</span>
                                <span class="cart-subprice">&#2547; {{ $subTotal }}</span>
                            </div>
                            <p class="cart-taxes text-center my-4">Taxes and shipping will be calculated at checkout.
                            </p>
                        </div>
                        <div class="minicart-btn-area d-flex align-items-center justify-content-between">
                            <a href="{{ route('cart.index') }}" class="minicart-btn btn-secondary">View Cart</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart-empty-area text-center py-5">
                    <div class="cart-empty-icon pb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M16 16s-1.5-2-4-2-4 2-4 2"></path>
                            <line x1="9" y1="9" x2="9.01" y2="9"></line>
                            <line x1="15" y1="9" x2="15.01" y2="9"></line>
                        </svg>
                    </div>
                    <p class="cart-empty">You have no items in your cart</p>
                    <a href="{{ route('all.product') }}" class="btn-secondary text-uppercase">
                        Continue Shoping
                    </a>
                </div>
            @endif
        </div>
    </div>
    <script></script>
@endauth
