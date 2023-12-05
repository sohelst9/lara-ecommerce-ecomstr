@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Wishlist">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Wishlist">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Wishlist" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Wishlist" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Wishlist" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Wishlist" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Wishlist</title>
@endsection
@section('main_content')
    <!-- breadcrumb start -->
    <div class="breadcrumb">
        <div class="container">
            <ul class="list-unstyled d-flex align-items-center m-0">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li>
                    <svg class="icon icon-breadcrumb" width="64" height="64" viewBox="0 0 64 64" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.4">
                            <path
                                d="M25.9375 8.5625L23.0625 11.4375L43.625 32L23.0625 52.5625L25.9375 55.4375L47.9375 33.4375L49.3125 32L47.9375 30.5625L25.9375 8.5625Z"
                                fill="#000" />
                        </g>
                    </svg>
                </li>
                <li>Wishlist Product</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="wishlist-page mt-100">
            <div class="wishlist-page-inner">
                <div class="container">
                    <div class="section-header d-flex align-items-center justify-content-between flex-wrap">
                        <h2 class="section-heading">My Wishlist</h2>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach ($wishlists as $wishlist)
                            <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                                <div class="product-card">
                                    <div class="product-card-img">
                                        <a class="hover-switch"
                                            href="{{ route('single.product', $wishlist->Product?->slug) }}">
                                            <img class="secondary-img" src="{{ asset($wishlist->Product?->thumbnail) }}"
                                                alt="{{ $wishlist->Product?->name }}">
                                            <img class="primary-img" src="{{ asset($wishlist->Product?->thumbnail) }}"
                                                alt="{{ $wishlist->Product?->name }}">
                                        </a>

                                        <div class="product-badge">
                                            @if ($wishlist->Product?->discount)
                                                <span
                                                    class="badge-label badge-percentage rounded">{{ $wishlist->Product?->discount }}%</span>
                                            @endif
                                        </div>

                                        <div class="product-card-action product-card-action-2 justify-content-center">
                                            @auth('web')
                                                @php
                                                    $wishlistProduct = App\Models\Frontend\Wishlist::where('user_id', auth()->user()->id)
                                                        ->where('product_id', $wishlist->product_id)
                                                        ->first();
                                                @endphp
                                                @if ($wishlistProduct)
                                                    <span class="add_to_wishlist action-card action-wishlist"
                                                        data-user="{{ auth()->user()->id }}"
                                                        data-id="{{ $wishlist->product_id }}" title="Wishlist Product Remove">
                                                        <i class="fa-solid fa-heart"></i>
                                                    </span>
                                                @else
                                                    <span class="add_to_wishlist action-card action-wishlist"
                                                        data-user="{{ auth()->user()->id }}"
                                                        data-id="{{ $wishlist->product_id }}">
                                                        <i class="fa-regular fa-heart"></i>
                                                    </span>
                                                @endif
                                            @else
                                                <a href="{{ route('login') }}" class="action-card action-wishlist">
                                                    <i class="fa-regular fa-heart"></i>
                                                </a>
                                            @endauth

                                            <a href="{{ route('single.product', $wishlist->Product?->slug) }}"
                                                class="action-card action-addtocart">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card-details">
                                        <h3 class="product-card-title">
                                            <a
                                                href="{{ route('single.product', $wishlist->Product?->slug) }}">{{ Str::limit($wishlist->Product?->name, 50) }}</a>
                                        </h3>
                                        <div class="product-card-price">
                                            <span
                                                class="card-price-regular {{ $wishlist->Product?->discount ? 'text-decoration-line-through' : '' }}">&#2547;
                                                {{ $wishlist->Product?->price }}</span>
                                            @if ($wishlist->Product?->discount)
                                                <span class="card-price-compare">&#2547;
                                                    {{ $wishlist->Product?->discount_price }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('front_script')
    <script>
        $(document).ready(function() {
            //----add wishlist product
            $('.add_to_wishlist').click(function() {
                const product_id = $(this).data('id');
                const user_id = $(this).data('user');
                $.ajax({
                    type: 'POST',
                    url: '/product/wishlist',
                    data: {
                        product_id: product_id,
                        user_id: user_id
                    },
                    success: function(response) {
                        alert(response);
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
