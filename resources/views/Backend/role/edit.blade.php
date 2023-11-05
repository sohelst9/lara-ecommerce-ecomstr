@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Edit Role</title>
@endsection
@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Edit Role
                            </p>
                            <a href="{{ route('role.index') }}">Back</a>
                        </h4>
                        <form class="forms-sample" action="{{ route('role.update', $role->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ $role->name }}" placeholder="Role Name..">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <p class="card-description">
                                Assign Permission
                            </p>
                            <div class="permission-section d-flex gap-3 flex-wrap">
                                @foreach ($permissions as $permission)
                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="permissions[]" class="form-check-input"
                                                value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            {{ $permission->name }}
                                            <i class="input-helper"></i></label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
