@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Profile Change</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Change Profile
                            </p>
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </h4>
                        <form class="forms-sample" action="{{ route('admin.profile.change', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group image-upload">
                                <label for="upload" class="image-upload-label">
                                    <div class="image-preview">
                                        @if ($user->image)
                                        <img src="{{ asset($user->image) }}"
                                        alt="Image Preview" id="image-preview">
                                        @else
                                        <img src="{{ asset('others/default-user.png') }}"
                                        alt="Image Preview" id="image-preview">
                                        @endif
                                        
                                    </div>
                                    <input type="file" id="upload" name="image" accept="image/*" onchange="previewImage(event)">
                                    <span class="image-upload-text">Choose an image</span>
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $user->name }}" placeholder="Your Name..">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ $user->email }}" placeholder="Your email..">
                                @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Change Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
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
    </script>
@endsection
