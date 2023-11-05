@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Edit Staff</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Edit Staff
                            </p>
                            <a href="{{ route('staff.index') }}">Back</a>
                        </h4>
                        <form class="forms-sample" action="{{ route('staff.update', $staff->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group image-upload">
                                <label for="upload" class="image-upload-label">
                                    <div class="image-preview">
                                        @if ($staff->image)
                                            <img src="{{ asset($staff->image) }}" alt="Image Preview" id="image-preview">
                                        @else
                                            <img src="{{ asset('others/default-user.png') }}" alt="Image Preview"
                                                id="image-preview">
                                        @endif
                                    </div>
                                    <input type="file" id="upload" name="image" accept="image/*"
                                        onchange="previewImage(event)">
                                    <span class="image-upload-text">Choose an image</span>
                                </label>
                            </div>
                            <div class="form-group">
                                <label for="name">Name <span class="text-danger">(*)</span></label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name', $staff->name) }}" placeholder="Staff Name..">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address <span class="text-danger">(*)</span></label>
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ old('email', $staff->email) }}" placeholder="Staff Email..">
                                @error('email')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">New Password <span class="text-danger">(*)</span></label>
                                <input type="password" name="password" class="form-control" id="password"
                                    value="{{ old('password') }}" placeholder="Staff Password..">
                                @error('password')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group permission_role">
                                <p class="card-description">
                                    Assign Roles
                                </p>
                                <div class="permission-section d-flex gap-3">
                                    @foreach ($roles as $role)
                                        <div class="form-check form-check-success">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="roles[]" class="form-check-input"
                                                    value="{{ $role->name }}" {{ in_array($role->id, $staff_assign_role_gets) ? 'checked' : ''  }}>
                                                {{ $role->name }}
                                                <i class="input-helper"></i></label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('roles')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Submit</button>
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
