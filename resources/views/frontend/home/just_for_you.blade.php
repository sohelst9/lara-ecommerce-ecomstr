<div class="instagram-section mt-100 overflow-hidden home-section">
    <div class="instagram-inner">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-heading">Just For You</h2>
                <p class="section-subheading">Most Beautiful Products</p>
            </div>
            <div class="instagram-container position-relative mt-48">
                <div class="common-slider"
                    data-slick='{
                        "slidesToShow": 4, 
                        "slidesToScroll": 2,
                        "dots": false,
                        "arrows": true,
                        "responsive": [
                          {
                            "breakpoint": 1281,
                            "settings": {
                              "slidesToShow": 3
                            }
                          },
                          {
                            "breakpoint": 768,
                            "settings": {
                              "slidesToShow": 2
                            }
                          }
                        ]
                    }'>
                    @foreach ($justforyou_products as $justforyou_product)
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                            <div class="product-card">
                                <div class="product-card-img">
                                    <a class="hover-switch"
                                        href="{{ route('single.product', $justforyou_product->slug) }}">
                                        <img class="secondary-img" src="{{ asset($justforyou_product->thumbnail) }}"
                                            alt="{{ $justforyou_product->name }}">
                                        <img class="primary-img" src="{{ asset($justforyou_product->thumbnail) }}"
                                            alt="{{ $justforyou_product->name }}">
                                    </a>

                                    <div class="product-badge">
                                        <span class="badge-label badge-new rounded">Just For You</span>
                                        @if ($justforyou_product->discount)
                                            <span
                                                class="badge-label badge-percentage rounded">{{ $justforyou_product->discount }}%</span>
                                        @endif
                                    </div>

                                    <div class="product-card-action product-card-action-2 justify-content-center">
                                        @auth('web')
                                            @php
                                                $wishlistProduct = App\Models\Frontend\Wishlist::where('user_id', auth()->user()->id)
                                                    ->where('product_id', $justforyou_product->id)
                                                    ->first();
                                            @endphp
                                            @if ($wishlistProduct)
                                                <span class="add_to_wishlist action-card action-wishlist"
                                                    data-user="{{ auth()->user()->id }}"
                                                    data-id="{{ $justforyou_product->id }}" title="Wishlist Product Remove">
                                                    <i class="fa-solid fa-heart"></i>
                                                </span>
                                            @else
                                                <span class="add_to_wishlist action-card action-wishlist"
                                                    data-user="{{ auth()->user()->id }}"
                                                    data-id="{{ $justforyou_product->id }}" title="Wishlist Product Add">
                                                    <i class="fa-regular fa-heart"></i>
                                                </span>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="action-card action-wishlist">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @endauth

                                        <a href="{{ route('single.product', $justforyou_product->slug) }}"
                                            class="action-card action-addtocart">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-details">
                                    <h3 class="product-card-title">
                                        <a
                                            href="{{ route('single.product', $justforyou_product->slug) }}">{{ Str::limit($justforyou_product->name, 50) }}</a>
                                    </h3>
                                    <div class="product-card-price">
                                        <span
                                            class="card-price-regular {{ $justforyou_product->discount ? 'text-decoration-line-through' : '' }}">&#2547;
                                            {{ $justforyou_product->price }}</span>
                                        @if ($justforyou_product->discount)
                                            <span class="card-price-compare">&#2547;
                                                {{ $justforyou_product->discount_price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="activate-arrows show-arrows-always article-arrows arrows-white"></div>
            </div>
        </div>
    </div>
</div>
