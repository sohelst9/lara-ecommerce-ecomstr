@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Your Cart Lists">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Your Cart Lists">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Your Cart Lists" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Your Cart Lists" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Your Cart Lists" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Your Cart Lists" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Your Cart Lists</title>
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
                <li>Your Cart Lists</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="cart-page mt-100">
            <div class="container">
                <div class="cart-page-wrapper">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-12">
                            <table class="cart-table w-100">
                                <thead>
                                    <tr>
                                        <th class="cart-caption heading_18">Product</th>
                                        <th class="cart-caption heading_18"></th>
                                        <th class="cart-caption text-center heading_18 d-none d-md-table-cell">Quantity</th>
                                        <th class="cart-caption text-end heading_18">Price</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @php
                                        $subTotal = 0;
                                    @endphp
                                    @foreach ($carts as $cart)
                                        <tr class="cart-item">
                                            <td class="cart-item-media">
                                                <div class="mini-img-wrapper">
                                                    <img class="mini-img" src="{{ asset($cart->product?->thumbnail) }}"
                                                        alt="img">
                                                </div>
                                            </td>
                                            <td class="cart-item-details">
                                                <h2 class="product-title"><a href="#">{{ $cart->product?->name }}</a>
                                                </h2>
                                                <p class="product-vendor">{{ $cart->Size?->name }} / {{ $cart->Color?->name }}</p>
                                            </td>
                                            <td class="cart-item-quantity">
                                                <div class="quantity d-flex align-items-center justify-content-between">
                                                    <button class="qty-btn dec-qty"><img src="{{ asset('frontend/assets/img/icon/minus.svg') }}"
                                                            alt="minus"></button>
                                                    <input class="qty-input" type="number" name="qty" value="{{ $cart->quantity }}"
                                                        min="0" readonly>
                                                    <button class="qty-btn inc-qty"><img src="{{ asset('frontend/assets/img/icon/plus.svg') }}"
                                                            alt="plus"></button>
                                                </div>
                                                <a href="#" class="product-remove mt-2">Remove</a>
                                            </td>
                                            <td class="cart-item-price text-end">
                                                <div class="product-price">&#2547; {{ $cart->Product?->discount_price }}</div>
                                            </td>
                                        </tr>
                                        @php
                                            $subTotal = $subTotal + $cart->Product?->discount_price;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center mt-4">
                                <a href="{{ route('checkout.index') }}" class="me-3 btn-secondary text-uppercase">
                                    Continue Shoping
                                </a>
                                <button type="submit" class="btn-primary text-uppercase">
                                    Update Cart
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12 col-12">
                            <div class="cart-total-area">
                                <h3 class="cart-total-title d-none d-lg-block mb-0">Cart Totals</h4>
                                    <div class="card-body">
                                        <p class="fs-5">Apply Discount Code</p>
                                        <form action="">
                                            <div class="input-group">
                                                <input type="text" class="form-control rounded-0"
                                                    placeholder="Enter discount code" id="coupon_code"
                                                    value="">
                                                <button class="btn btn-dark btn-ecomm" type="button"
                                                    id="coupon_btn">Apply</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="cart-total-box mt-4">
                                        <div class="subtotal-item subtotal-box">
                                            <h4 class="subtotal-title">Subtotals:</h4>
                                            <p class="subtotal-value">&#2547; <span>{{ $subTotal }}</span></p>
                                        </div>
                                        <div class="subtotal-item shipping-box">
                                            <h4 class="subtotal-title">Shipping:</h4>
                                            <p class="subtotal-value">&#2547; <span></span></p>
                                        </div>
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Discount:</h4>
                                            <p class="subtotal-value">&#2547; <span>{{ $discount }}</span></p>
                                        </div>
                                        <hr />
                                        <div class="subtotal-item discount-box">
                                            <h4 class="subtotal-title">Total:</h4>
                                            <p class="subtotal-value">&#2547; <span></span></p>
                                        </div>
                                        <p class="shipping_text">Shipping & taxes calculated at checkout</p>
                                        <div class="d-flex justify-content-center mt-4">
                                            <a href="{{ route('checkout.index') }}" class="position-relative btn-primary text-uppercase">
                                                Procced to checkout
                                            </a>
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
