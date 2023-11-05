@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Edit Color</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Edit Color
                            </p>
                            <a href="{{ route('color.index') }}">Back</a>
                        </h4>

                        <form class="forms-sample" action="{{ route('color.update', $color->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $color->name }}"
                                    placeholder="Color Name..">
                                @error('name')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
