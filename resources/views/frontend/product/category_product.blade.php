@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="{{ $category->meta_title }}">
    <meta property="og:description" content="{{ $category->meta_description }}">
    <meta property="og:image" content="{{ asset($category->image) }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="{{ $category->meta_title }}" />
    <meta name="description" content="{{ $category->meta_description }}" />
    <meta name="keywords" content="{{ $category->meta_keyword }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | {{ $category->title }}</title>
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
                <li>{{ $category->title }}</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->
    <div class="collection mt-4">
        <div class="container">
            <div class="row flex-row-reverse">
                <!-- product area start -->
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="filter-sort-wrapper d-flex justify-content-between flex-wrap">
                        <div class="collection-title-wrap d-flex align-items-end">
                            <h2 class="collection-title heading_24 mb-0">All products</h2>
                            <p class="collection-counter text_16 mb-0 ms-2">({{ $category_products->count() }} items)</p>
                        </div>
                        <div class="filter-sorting">
                            <div class="collection-sorting position-relative d-none d-lg-block">
                                <div class="sorting-header text_16 d-flex align-items-center justify-content-end">
                                    <span class="sorting-title me-2">Sort by:</span>
                                    <span class="active-sorting">Featured</span>
                                    <span class="sorting-icon">
                                        <svg class="icon icon-down" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-chevron-down">
                                            <polyline points="6 9 12 15 18 9"></polyline>
                                        </svg>
                                    </span>
                                </div>
                                <ul class="sorting-lists list-unstyled m-0">
                                    <li><a href="#" class="text_14">Featured</a></li>
                                    <li><a href="#" class="text_14">Best Selling</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="collection-product-container">
                        <div class="row">
                            @foreach ($category_products as $product)
                                <div class="col-lg-3 col-md-4 col-6" data-aos="fade-up" data-aos-duration="700">
                                    <div class="product-card">
                                        <div class="product-card-img">
                                            <a class="hover-switch" href="{{ route('single.product', $product->slug) }}">
                                                <img class="secondary-img" src="{{ asset($product->thumbnail) }}"
                                                    alt="{{ $product->name }}">
                                                <img class="primary-img" src="{{ asset($product->thumbnail) }}"
                                                    alt="{{ $product->name }}">
                                            </a>

                                            <div class="product-badge">
                                                @if ($product->is_feature)
                                                    <span class="badge-label badge-new rounded">Featured</span>
                                                @endif

                                                @if ($product->just_for_you)
                                                    <span class="badge-label badge-new rounded">Just For You</span>
                                                @endif

                                                @if ($product->discount)
                                                    <span
                                                        class="badge-label badge-percentage rounded">{{ $product->discount }}%</span>
                                                @endif
                                            </div>

                                            <div class="product-card-action product-card-action-2 justify-content-center">
                                               <a href="{{ route('single.product', $product->slug) }}" class="action-card action-addtocart">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-card-details">
                                            <ul class="color-lists list-unstyled d-flex align-items-center">
                                                category : {{ $product->Category->title }}
                                            </ul>
                                            <h3 class="product-card-title">
                                                <a href="{{ route('single.product', $product->slug) }}">{{ Str::limit($product->name, 50) }}</a>
                                            </h3>
                                            <div class="product-card-price">
                                                <span class="card-price-regular {{ $product->discount ? 'text-decoration-line-through' : '' }}">&#2547; {{ $product->price }}</span>
                                                @if ($product->discount)
                                                    <span
                                                        class="card-price-compare">&#2547; {{ $product->discount_price }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination justify-content-center mt-2">
                        <nav>
                            {{ $category_products->links('frontend.inc.custom_paginate') }}
                        </nav>
                    </div>
                </div>
                <!-- product area end -->
            </div>
        </div>
    </div>
@endsection
