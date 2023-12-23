@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Checkout">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Checkout">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Checkout" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Checkout" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Checkout" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Checkout" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Checkout</title>
    <style>
        .payment-options {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .payment-options label {
            display: flex;
            flex-direction: column;
            align-items: center;
            cursor: pointer;
        }

        .payment-options input[type="radio"] {
            display: none;
        }

        .payment-options img {
            width: 100px;
            height: 40px;
            /* Adjust the size as needed */
            border: 2px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .payment-options input[type="radio"]:checked+img {
            border-color: rgb(238, 85, 15);
            /* Highlight the selected option */
        }
    </style>
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
                <li>Checkout</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="checkout-page mt-100">
            <div class="container">
                <div class="checkout-page-wrapper">
                    <form action="{{ route('order') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                                <div class="section-header mb-3">
                                    <h2 class="section-heading">Check out</h2>
                                </div>
                                <div class="checkout-user-area overflow-hidden d-flex align-items-center">
                                    <div class="checkout-user-img me-4">
                                        @if (auth()->user()->image)
                                            <img src="{{ asset(auth()->user()->image) }}" alt="img">
                                        @else
                                            <img src="{{ asset('image/default-image.webp') }}" alt="img">
                                        @endif
                                    </div>
                                    <div
                                        class="checkout-user-details d-flex align-items-center justify-content-between w-100">
                                        <div class="checkout-user-info">
                                            <h2 class="checkout-user-name">{{ auth()->user()->name }}</h2>
                                            <p class="checkout-user-address mb-0">{{ auth()->user()->phone }}</p>
                                        </div>

                                        {{-- <a href="#" class="edit-user btn-secondary">EDIT PROFILE</a> --}}
                                    </div>
                                </div>

                                <div class="shipping-address-area">
                                    <h2 class="shipping-address-heading pb-1">Shipping & Billing address</h2>
                                    <div class="shipping-address-form-wrapper">
                                        <div class="shipping-address-form common-form">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="name" class="label">Your Name <span
                                                                class="text-danger">(*)</span></label>
                                                        <input type="text" name="name" id="name"
                                                            value="{{ auth()->user()->name }}" />
                                                        @error('name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>

                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="email" class="label">Email address <span
                                                                class="text-danger">(*)</span></label>
                                                        <input type="email" name="email" id="email"
                                                            value="{{ auth()->user()->email }}" />
                                                        @error('email')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="phone" class="label">Phone number <span
                                                                class="text-danger">(*)</span></label>
                                                        <input type="text" name="phone" id="phone"
                                                            value="{{ auth()->user()->phone }}" />
                                                        @error('phone')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="division" class="label">Division <span
                                                                class="text-danger">(*)</span></label>
                                                        <select class="form-select" name="division" id="division">
                                                            <option value="">select division</option>
                                                            @foreach ($divisions as $division)
                                                                <option value="{{ $division->id }}">{{ $division->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('division')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="district" class="label">District <span
                                                                class="text-danger">(*)</span></label>
                                                        <select class="form-select" name="district" id="district">
                                                        </select>
                                                        @error('district')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="sub_district" class="label">Sub District <span
                                                                class="text-danger">(*)</span></label>
                                                        <select class="form-select" name="sub_district"
                                                            id="sub_district">
                                                        </select>
                                                        @error('sub_district')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="zip_code" class="label">Zip code</label>
                                                        <input type="text" name="zip_code" id="zip_code"
                                                            value="{{ old('zip_code') }}" />
                                                        @error('zip_code')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="address" class="label">Address <span
                                                                class="text-danger">(*)</span></label>
                                                        <input type="text" name="address" id="address"
                                                            value="{{ auth()->user()->adderess }}">
                                                        @error('address')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </fieldset>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-12">
                                                    <fieldset>
                                                        <label for="order_note" class="label">Order Note</label>
                                                        <input type="text" name="order_note" id="order_note"
                                                            value="{{ old('order_note') }}">
                                                    </fieldset>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                                <div class="cart-total-area checkout-summary-area">
                                    <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Order summary</h4>

                                        @foreach ($carts as $cart)
                                            <div class="minicart-item d-flex">
                                                <div class="mini-img-wrapper">
                                                    <img class="mini-img" src="{{ asset($cart->product?->thumbnail) }}"
                                                        alt="img">
                                                </div>
                                                <div class="product-info">
                                                    <h2 class="product-title"><a>{{ $cart->product?->name }}</a>
                                                    </h2>
                                                    <p class="product-vendor">&#2547;
                                                        {{ $cart->Product?->discount_price }} x
                                                        {{ $cart->quantity }}</p>
                                                    <p>{{ $cart->Size?->name }} /
                                                        {{ $cart->Color?->name }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="cart-total-box mt-4 bg-transparent p-0">
                                            <div class="subtotal-item subtotal-box">
                                                <h4 class="subtotal-title">Subtotals:</h4>
                                                <input type="hidden" name="subTotal" value="{{ session('subtotal') }}">
                                                <p class="subtotal-value">&#2547;{{ session('subtotal') }}</p>
                                            </div>
                                            <div class="subtotal-item discount-box">
                                                <h4 class="subtotal-title">Discount:</h4>
                                                <input type="hidden" name="discount" value="{{ session('discount') }}">
                                                <p class="subtotal-value">{{ session('discount') }} %</p>
                                            </div>

                                            <div class="mt-3">
                                                <h6 class="">Delivery Charge :</h4>
                                                    <div class="radio-group">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="delevery_charge" id="inside_dhaka" value="70">
                                                            <label class="form-check-label" for="inside_dhaka">
                                                                Inside dhaka - &#2547; 70
                                                            </label>
                                                        </div>

                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="delevery_charge" id="outside_dhaka" value="130">
                                                            <label class="form-check-label" for="outside_dhaka">
                                                                Outside dhaka - &#2547; 130
                                                            </label>
                                                        </div>
                                                    </div>
                                                    @error('delevery_charge')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                            </div>
                                            <hr />
                                            <div class="subtotal-item discount-box">
                                                <h4 class="subtotal-title">Total:</h4>
                                                <input type="hidden" id="total" name="total"
                                                    value="{{ session('total') }}">
                                                <p class="subtotal-value">&#2547;<span
                                                        id="grand_total">{{ session('total') }}</p>
                                            </div>
                                        </div>

                                        <div class="payment-options">
                                            <h6>Select payment Method :</h6>
                                            {{-- <label>
                                                <input type="radio" name="payment_type" value="stripe">
                                                <img src="{{ asset('frontend/assets/img/payment/stripe.png') }}"
                                                    alt="Stripe">
                                            </label>

                                            <label>
                                                <input type="radio" name="payment_type" value="bkash">
                                                <img src="{{ asset('frontend/assets/img/payment/bikash.png') }}"
                                                    alt="bKash">
                                            </label>

                                            <label>
                                                <input type="radio" name="payment_type" value="nagad">
                                                <img src="{{ asset('frontend/assets/img/payment/nagad.png') }}"
                                                    alt="Nagad">
                                            </label>

                                            <label>
                                                <input type="radio" name="payment_type" value="paypal">
                                                <img src="{{ asset('frontend/assets/img/payment/paypal.png') }}"
                                                    alt="PayPal">
                                            </label> --}}

                                            <label>
                                                <input type="radio" name="payment_type" value="cash_on_delivery">
                                                <img src="{{ asset('frontend/assets/img/payment/cash_one_delevery.png') }}"
                                                    alt="Cash on Delivery">
                                            </label>
                                            @error('payment_type')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-address-area billing-area">
                            <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                <a href="{{ route('cart.index') }}"
                                    class="checkout-page-btn minicart-btn btn-secondary">BACK TO
                                    CART</a>
                                <button onclick="return confirm('Are you sure you want to order?')" type="submit" class="checkout-page-btn minicart-btn btn-primary">PLACE
                                    ORDER</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('front_script')
    <script>
        $('#division').change(function() {
            var division_id = $('#division').val();
            var url = "{{ route('district') }}";

            $.ajax({
                type: "post",
                url: url,
                data: {
                    'division_id': division_id
                },
                success: function(data) {
                    $('#district').html(data);
                    $('#sub_district').html('');
                }
            });
        })

        $('#district').change(function() {
            var district_id = $('#district').val();
            var url = "{{ route('sub_district') }}";

            $.ajax({
                type: "post",
                url: url,
                data: {
                    'district_id': district_id
                },
                success: function(data) {
                    $('#sub_district').html(data);
                }
            });
        })
        //delivery charge--
        $('#inside_dhaka').click(function() {
            var total = parseFloat($('#total').val());
            var inside_value = parseFloat($('#inside_dhaka').val());
            var g_total = total + inside_value;
            $('#grand_total').html(g_total);
        })

        $('#outside_dhaka').click(function() {
            var total = parseFloat($('#total').val());
            var inside_value = parseFloat($('#outside_dhaka').val());
            var g_total = total + inside_value;
            $('#grand_total').html(g_total);
        })
    </script>
@endsection
