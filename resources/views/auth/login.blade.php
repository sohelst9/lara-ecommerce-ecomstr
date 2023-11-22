@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | User LOgin">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | User LOgin">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | User LOgin" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | User LOgin" />
    <meta name="description" content="E-COM-STR E-Commerce Website | User LOgin" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | User LOgin" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | User LOgin</title>
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
                <li>Login</li>
            </ul>
        </div>
    </div>
    <!-- breadcrumb end -->

    <main id="MainContent" class="content-for-layout">
        <div class="login-page">
            <div class="container">
                <form action="{{ route('login') }}" class="login-form common-form mx-auto" method="POST">
                    @csrf
                    <div class="section-header mb-3">
                        <h2 class="section-heading text-center">Login</h2>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Email address</label>
                                <input type="email" name="email" value="{{ old('email') }}" />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Password</label>
                                <input type="password" name="password" id="password" />
                                <div class="d-flex align-items-center">
                                    <input class="password_show_hide me-2" type="checkbox" id="showPassword">
                                    <label for="showPassword" class="mt-1">Show Password</label>
                                </div>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12 mt-3">
                            <a href="{{ route('password.request') }}" class="text_14 d-block">Forgot your password?</a>
                            <button type="submit" class="btn-primary d-block mt-4 btn-signin">SIGN IN</button>
                            <a href="{{ route('register') }}" class="btn-secondary mt-2 btn-signin">CREATE AN ACCOUNT</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('front_script')
    <script>
        // JavaScript to toggle password visibility
        const passwordInput = document.getElementById("password");
        const showPasswordCheckbox = document.getElementById("showPassword");
        showPasswordCheckbox.addEventListener("change", function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text"; // Show password
            } else {
                passwordInput.type = "password"; // Hide password
            }
        });
    </script>
@endsection
