<div class="featured-collection mt-100 overflow-hidden">
    <div class="collection-tab-inner">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="section-heading">Popular Products</h2>
                <p class="section-subheading">Top Popular Products</p>
            </div>
            <div class="row">
                @foreach ($popular_products as $popular_product)
                    <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                        <div class="product-card">
                            <div class="product-card-img">
                                <a class="hover-switch" href="{{ route('single.product', $popular_product->slug) }}">
                                    <img class="secondary-img" src="{{ asset($popular_product->thumbnail) }}"
                                        alt="{{ $popular_product->name }}">
                                    <img class="primary-img" src="{{ asset($popular_product->thumbnail) }}"
                                        alt="{{ $popular_product->name }}">
                                </a>

                                <div class="product-badge">
                                    <span class="badge-label badge-new rounded">Featured</span>
                                    @if ($popular_product->discount)
                                        <span
                                            class="badge-label badge-percentage rounded">{{ $popular_product->discount }}%</span>
                                    @endif
                                </div>

                                <div class="product-card-action product-card-action-2 justify-content-center">
                                    @auth('web')
                                        @php
                                            $wishlistProduct = App\Models\Frontend\Wishlist::where('user_id', auth()->user()->id)
                                                ->where('product_id', $popular_product->id)
                                                ->first();
                                        @endphp
                                        @if ($wishlistProduct)
                                            <span class="add_to_wishlist action-card action-wishlist"
                                                data-user="{{ auth()->user()->id }}"
                                                data-id="{{ $popular_product->id }}" title="Wishlist Product Remove">
                                                <i class="fa-solid fa-heart"></i>
                                            </span>
                                        @else
                                            <span class="add_to_wishlist action-card action-wishlist"
                                                data-user="{{ auth()->user()->id }}"
                                                data-id="{{ $popular_product->id }}" title="Wishlist Product Add">
                                                <i class="fa-regular fa-heart"></i>
                                            </span>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="action-card action-wishlist">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    @endauth

                                    <a href="{{ route('single.product', $popular_product->slug) }}"
                                        class="action-card action-addtocart">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-card-details">
                                <h3 class="product-card-title">
                                    <a href="{{ route('single.product', $popular_product->slug) }}">{{ Str::limit($popular_product->name, 50) }}</a>
                                </h3>
                                <div class="product-card-price">
                                    <span class="card-price-regular {{ $popular_product->discount ? 'text-decoration-line-through' : '' }}">&#2547; {{ $popular_product->price }}</span>
                                    @if ($popular_product->discount)
                                        <span class="card-price-compare">&#2547; {{ $popular_product->discount_price }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                <a class="btn-primary" href="{{ route('all.product') }}">VIEW ALL</a>
            </div>
        </div>
    </div>
</div>
