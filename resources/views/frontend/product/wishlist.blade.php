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
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                            <div class="product-card">
                                <div class="product-card-img">
                                    <a class="hover-switch" href="collection-left-sidebar.html">
                                        <img class="secondary-img" src="{{ asset('frontend/assets/img/products/furniture/9.jpg') }}"
                                            alt="product-img">
                                        <img class="primary-img" src="{{ asset('frontend/assets/img/products/furniture/1.jpg') }}"
                                            alt="product-img">
                                    </a>

                                    <div class="product-badge">
                                        <span class="badge-label badge-percentage rounded">-44%</span>
                                    </div>

                                    <div class="product-card-action product-card-action-2 justify-content-center">
                                        <a href="#" class="action-card action-wishlist">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>

                                        <a href="#" class="action-card action-addtocart">
                                            <i class="fa-solid fa-bag-shopping"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="product-card-details">
                                    <ul class="color-lists list-unstyled d-flex align-items-center">
                                        <li>category : lofere</li>
                                    </ul>
                                    <h3 class="product-card-title">
                                        <a href="">best wood furniture</a>
                                    </h3>
                                    <div class="product-card-price">
                                        <span class="card-price-regular">$1529</span>
                                        <span class="card-price-compare text-decoration-line-through">$1759</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
