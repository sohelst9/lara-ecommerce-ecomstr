@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Order Success">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Order Success">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Order Success" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Order Success" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Order Success" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Order Success" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Order Success</title>
@endsection
@section('main_content')
    <style>
        .jumbotron {
            padding-top: 30px;
            padding-bottom: 30px;
            margin-bottom: 30px;
            color: inherit;
            background-color: #eee;
            box-shadow: 2px 2px 4px #000000;
        }

        .jumbotron .h1,
        .jumbotron h1 {
            color: inherit;
        }

        .jumbotron p {
            margin-bottom: 15px;
            font-size: 21px;
            font-weight: 200;
        }

        .jumbotron>hr {
            border-top-color: #d5d5d5;
        }

        .container .jumbotron,
        .container-fluid .jumbotron {
            padding-right: 15px;
            padding-left: 15px;
            border-radius: 6px;
        }

        .jumbotron .container {
            max-width: 100%;
        }

        @media screen and (min-width: 768px) {
            .jumbotron {
                padding-top: 48px;
                padding-bottom: 48px;
            }

            .container .jumbotron,
            .container-fluid .jumbotron {
                padding-right: 60px;
                padding-left: 60px;
            }

            .jumbotron .h1,
            .jumbotron h1 {
                font-size: 63px;
            }
        }
    </style>
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
                <li>Order Success</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!----- main start ---------->
    <div class="container mt-5">
        <div class="row">
            <div class="jumbotron">
                <h2 class="text-center mt-5">Hello ! {{ auth()->user()->name }}</h2>
                <h2 class="text-center">YOUR ORDER HAS BEEN RECEIVED</h2>
                <h3 class="text-center">Thank you for your payment, it’s processing</h3>

                <p class="text-center">Your order # is: {{ $order->trnx_id }}</p>
                <p class="text-center">You will receive an order confirmation email with details of your order and a
                    link to track your process.</p>
                <div class="text-center">
                    <a href="{{ route('all.product') }}" class="checkout-page-btn minicart-btn btn-primary">CONTINUE
                        Shopping</a>
                </div>
            </div>
        </div>
    </div>
    <!----- main end ---------->
@endsection
