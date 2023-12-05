@extends('frontend.inc.app')
@section('heading')
    <meta property="og:title" content="E-COM-STR E-Commerce Website | Customer Order">
    <meta property="og:description" content="E-COM-STR E-Commerce Website | Customer Order">
    <meta property="og:image" content="E-COM-STR E-Commerce Website | Customer Order" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="E-COM-STR E-Commerce Website | Customer Order" />
    <meta name="description" content="E-COM-STR E-Commerce Website | Customer Order" />
    <meta name="keywords" content="E-COM-STR E-Commerce Website | Customer Order" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>E-COM-STR E-Commerce Website | Customer Order</title>
@endsection

@section('main_content')
    <section class="my-account pt-6">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3">
                    @include('frontend.customer.inc.sidebar')
                </div>
                <div class="col-xl-9 mt-2">
                    <form class="forms-sample" action="{{ route('customer.profile.update', $user->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group image-upload mt-5">
                            <label for="upload" class="image-upload-label">
                                <div class="image-preview">
                                    @if ($user->image)
                                        <img src="{{ asset($user->image) }}" alt="{{ $user->name }}" id="image-preview">
                                    @else
                                        <img src="{{ asset('others/default-user.png') }}" alt="default-user.png"
                                            id="image-preview">
                                    @endif

                                </div>
                                <input type="file" id="upload" name="image" accept="image/*"
                                    onchange="previewImage(event)">
                                <span class="image-upload-text">Choose an image</span>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="name" class="mt-2">Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $user->name }}" placeholder="Your Name..">
                            @error('name')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="mt-2">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                        value="{{ $user->phone }}" placeholder="Your Phone Number..">
                                    @error('phone')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="mt-2">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ $user->email }}" placeholder="Your email..">
                                    @error('email')
                                        <p class="text-danger mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="address" class="mt-2 mb-2">Address</label>
                            <textarea name="address" id="address" cols="30" rows="2" class="form-control">{{ $user->address }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md mt-2 mb-2">Update Profile</button>
                    </form>
                    <hr>
                    <span class="text_change_password">Change Password</span>
                    <form class="forms-sample mt-2" action="{{ route('customer.change.password', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="old_password" class="mb-2">Old Password</label>
                            <input type="password" name="old_password" class="form-control" id="old_password">
                            @error('old_password')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                            <div class="d-flex align-items-center">
                                <input class="password_show_hide me-2" type="checkbox" id="OLdshowPassword">
                                <label for="OLdshowPassword" class="mt-1">Show Password</label>
                            </div>
                        </div>
                        <div class="form-group mt-2">
                            <label for="new_password" class="mb-2">New Password</label>
                            <input type="password" name="new_password" class="form-control" id="new_password">
                            @error('new_password')
                                <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                            <div class="d-flex align-items-center">
                                <input class="password_show_hide me-2" type="checkbox" id="NewshowPassword">
                                <label for="NewshowPassword" class="mt-1">Show Password</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md mt-2">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('front_script')
    <script>
        //---image preview start
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
            }
        }
        //---image preview end

        // old password toggle password visibility
        const OLDpasswordInput = document.getElementById("old_password");
        const OLDshowPasswordCheckbox = document.getElementById("OLdshowPassword");
        OLDshowPasswordCheckbox.addEventListener("change", function() {
            if (OLDshowPasswordCheckbox.checked) {
                OLDpasswordInput.type = "text"; // Show password
            } else {
                OLDpasswordInput.type = "password"; // Hide password
            }
        });

        // new password toggle password visibility
        const passwordInput = document.getElementById("new_password");
        const showPasswordCheckbox = document.getElementById("NewshowPassword");
        showPasswordCheckbox.addEventListener("change", function() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = "text"; // Show password
            } else {
                passwordInput.type = "password"; // Hide password
            }
        });
    </script>
@endsection
