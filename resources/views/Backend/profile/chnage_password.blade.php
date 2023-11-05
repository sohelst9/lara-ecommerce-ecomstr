@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Change Password</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Change Password
                            </p>
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </h4>
                        <form class="forms-sample" action="{{ route('admin.password.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="New Password..">
                                    <input class="mt-2" type="checkbox" id="showPassword"> Show Password
                                @error('password')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Re Type Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="password_confirmation">
                                    <input class="mt-2" type="checkbox" id="showReTypePassword"> Show Password
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        //--show hide new password
        const passwordInput = document.getElementById("password");
        const showPasswordCheckbox = document.getElementById("showPassword");
        showPasswordCheckbox.addEventListener("change", function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text"; // Show password
            } else {
                passwordInput.type = "password"; // Hide password
            }
        });
        //---show hide confirm password
        const reTypeInput = document.getElementById("password_confirmation");
        const retypeshowPasswordCheckbox = document.getElementById("showReTypePassword");
        retypeshowPasswordCheckbox.addEventListener("change", function() {
            if (retypeshowPasswordCheckbox.checked) {
                reTypeInput.type = "text"; // Show password
            } else {
                reTypeInput.type = "password"; // Hide password
            }
        });
    </script>
@endsection
