@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Create Role</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                New Role
                            </p>
                            <a href="{{ route('role.index') }}">Back</a>
                        </h4>

                        <form class="forms-sample" action="{{ route('role.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ old('name') }}" placeholder="Role Name..">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <p class="card-description">
                                Assign Permission
                            </p>
                            <div class="permission-section d-flex flex-wrap gap-3">
                                @foreach ($permissions as $permission)
                                    <div class="form-check form-check-success">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="permissions[]" class="form-check-input"
                                                value="{{ $permission->id }}">
                                            {{ $permission->name }}
                                            <i class="input-helper"></i></label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
