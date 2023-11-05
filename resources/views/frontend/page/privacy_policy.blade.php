@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Privacy Policy">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Privacy Policy">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Privacy Policy" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Privacy Policy" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Privacy Policy" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Privacy Policy" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Privacy Policy</title>
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
                <li>Privacy Policy</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->
@endsection
