@extends('Backend.app')
@section('dash_title')
    <title>Lara Vue E-commerce | Edit Banner</title>
@endsection

@section('das_content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card m-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <p class="card-description">
                                Edit Banner
                            </p>
                            <a href="{{ route('banner.index') }}">Back</a>
                        </h4>

                        <form class="forms-sample" action="{{ route('banner.update', $banner->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ $banner->title }}" placeholder="Banner Title..">
                                @error('title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sub_title">Sub Title</label>
                                <input type="text" name="sub_title" class="form-control" id="sub_title"
                                    value="{{ $banner->sub_title }}" placeholder="Banner Sub Title..">
                                @error('sub_title')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image <span class="text-danger">(1920*600)</span></label>
                                <input type="file" name="image" class="form-control" id="image">
                                @error('image')
                                    <p class="text-danger mt-2">{{ $message }}</p>
                                @enderror
                                @if ($banner->image)
                                    <img src="{{ asset($banner->image) }}" class="mt-2" width="140" height="100">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary btn-md me-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
