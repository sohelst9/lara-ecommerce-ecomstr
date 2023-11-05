@extends('Backend.auth.app')
@section('title')
    <title>Lara Vue E-commerce | Login</title>
@endsection

@section('auth_content')
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                    <h3>Lara Vue E-commerce</h3>
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" action="{{ route('admin.login.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" name="email"
                            placeholder="email Address..">
                        @error('email')
                            <p class="text-danger mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" name="password" id="password"
                            placeholder="Password">
                        <input class="mt-2" type="checkbox" id="showPassword"> Show Password
                        @error('password')
                            <p class="text-danger mt-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit"
                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                    </div>
                </form>
                <div class="my-2 text-center">
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="mb-2 text-center">
                    <button type="button" class="btn btn-block btn-google auth-form-btn">
                        <i class="ti-google me-2"></i>Connect using Google
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            document.querySelector('.alert').style.display = 'none';
        }, 5000); // 20,000 milliseconds = 20 seconds

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
